<?php namespace Anomaly\SitemapExtension\Http\Controller;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Module\Module;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\Config\Repository;
use Roumen\Sitemap\Sitemap;

/**
 * Class SitemapController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SitemapController extends PublicController
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The addon collection.
     *
     * @var AddonCollection
     */
    protected $addons;

    /**
     * The sitemap utility.
     *
     * @var Sitemap
     */
    protected $sitemap;

    /**
     * Create a new SitemapController instance.
     *
     * @param Repository $config
     * @param AddonCollection $addons
     * @param Sitemap $sitemap
     */
    public function __construct(Repository $config, AddonCollection $addons, Sitemap $sitemap)
    {
        parent::__construct();

        $this->config  = $config;
        $this->addons  = $addons;
        $this->sitemap = $sitemap;
    }

    /**
     * Return an index of sitemaps.
     *
     * @param  null $format
     * @return \Illuminate\Support\Facades\View
     */
    public function index($format = null)
    {
        /* @var Addon $addon */
        foreach ($this->addons->withConfig('sitemap')->forget(['anomaly.extension.sitemap']) as $addon) {

            /* @var Module|Extension $addon */
            if (in_array($addon->getType(), ['module', 'extension']) && !$addon->isEnabled()) {
                continue;
            }

            $lastmod = $this->config->get($addon->getNamespace('sitemap.lastmod'));

            $this->sitemap->addSitemap(
                $this->config->get(
                    $addon->getNamespace('sitemap.location') . $format,
                    $this->url->to('sitemap/' . $addon->getNamespace() . $format)
                ),
                $lastmod ? $this->container->call($lastmod) : null
            );
        }

        return $this->sitemap->render('sitemapindex');
    }

    /**
     * Return a sitemap.
     *
     * @param  null $format
     * @return \Illuminate\Support\Facades\View
     */
    public function view($format = null)
    {
        $addon    = $this->addons->get(array_get($this->route->getAction(), 'addon'));
        $sitemaps = $this->config->get($addon->getNamespace('sitemap'));
        /**
         * Since the sitemap can be a flat sitemap or an array of sitemaps,
         * if it is flat then convert it to an array of one.
         */
        if (!empty($sitemaps) && !is_array(array_values($sitemaps)[0])) {
            $sitemaps = [$sitemaps];
        }

        foreach ($sitemaps as $sitemap) {
            foreach ($this->container->call(array_get($sitemap, 'entries')) as $entry) {
                if ($handler = array_get($sitemap, 'handler')) {
                    $this->container->call(
                        $handler,
                        [
                            'entry'   => $entry,
                            'sitemap' => $this->sitemap,
                        ]
                    );
                } elseif ($parameters = array_get($sitemap, 'parameters')) {
                    $this->container->call(
                        [
                            $this->sitemap,
                            'add',
                        ],
                        $this->container->call($parameters, compact('entry'))
                    );
                }
            }
        }
        
        return $this->sitemap->render(ltrim($format, '.'));
    }
}
