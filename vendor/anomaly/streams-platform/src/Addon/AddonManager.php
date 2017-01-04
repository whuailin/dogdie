<?php namespace Anomaly\Streams\Platform\Addon;

use Anomaly\Streams\Platform\Addon\Event\AddonsHaveRegistered;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionModel;
use Anomaly\Streams\Platform\Addon\Module\ModuleModel;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * Class AddonManager
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class AddonManager
{

    /**
     * The addon paths.
     *
     * @var AddonPaths
     */
    protected $paths;

    /**
     * The addon collection.
     *
     * @var AddonCollection
     */
    protected $addons;

    /**
     * The addon loader.
     *
     * @var AddonLoader
     */
    protected $loader;

    /**
     * The addon integrator.
     *
     * @var AddonIntegrator
     */
    protected $integrator;

    /**
     * The modules model.
     *
     * @var ModuleModel
     */
    protected $modules;

    /**
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * The extensions model.
     *
     * @var ExtensionModel
     */
    protected $extensions;

    /**
     * Create a new AddonManager instance.
     *
     * @param AddonPaths      $paths
     * @param AddonLoader     $loader
     * @param ModuleModel     $modules
     * @param Dispatcher      $dispatcher
     * @param ExtensionModel  $extensions
     * @param AddonIntegrator $integrator
     * @param AddonCollection $addons
     */
    public function __construct(
        AddonPaths $paths,
        AddonLoader $loader,
        ModuleModel $modules,
        Dispatcher $dispatcher,
        ExtensionModel $extensions,
        AddonIntegrator $integrator,
        AddonCollection $addons
    ) {
        $this->paths      = $paths;
        $this->addons     = $addons;
        $this->loader     = $loader;
        $this->modules    = $modules;
        $this->integrator = $integrator;
        $this->dispatcher = $dispatcher;
        $this->extensions = $extensions;
    }

    /**
     * Register all addons.
     */
    public function register()
    {
        $enabled   = $this->getEnabledAddonNamespaces();
        $installed = $this->getInstalledAddonNamespaces();

        $paths = $this->paths->all();

        /*
         * First load all the addons
         * so they're available.
         */
        foreach ($paths as $path) {
            $this->loader->load($path);
        }

        $this->loader->register();

        /*
         * Then register all of the addons now
         * that they're all PSR autoloaded.
         */
        foreach ($paths as $path) {

            $namespace = $this->getAddonNamespace($path);

            $this->integrator->register(
                $path,
                $namespace,
                in_array($namespace, $enabled),
                in_array($namespace, $installed)
            );
        }

        // Sort all addons.
        $this->addons = $this->addons->sort();

        /*
         * Disperse addons to their
         * respective collections and
         * finish the integration service.
         */
        $this->addons->disperse();
        $this->addons->registered();
        $this->integrator->finish();

        $this->dispatcher->fire(new AddonsHaveRegistered($this->addons));
    }

    /**
     * Get namespaces for enabled addons.
     *
     * @return array
     */
    protected function getEnabledAddonNamespaces()
    {
        if (!env('INSTALLED')) {
            return [];
        }

        $modules = $this->modules->cache(
            'streams::modules.enabled',
            9999,
            function () {
                return $this->modules->getEnabledNamespaces()->all();
            }
        );

        $extensions = $this->extensions->cache(
            'streams::extensions.enabled',
            9999,
            function () {
                return $this->extensions->getEnabledNamespaces()->all();
            }
        );

        return array_merge($modules, $extensions);
    }

    /**
     * Get namespaces for installed addons.
     *
     * @return array
     */
    protected function getInstalledAddonNamespaces()
    {
        if (!env('INSTALLED')) {
            return [];
        }

        $modules = $this->modules->cache(
            'streams::modules.installed',
            9999,
            function () {
                return $this->modules->getInstalledNamespaces()->all();
            }
        );

        $extensions = $this->extensions->cache(
            'streams::extensions.installed',
            9999,
            function () {
                return $this->extensions->getInstalledNamespaces()->all();
            }
        );

        return array_merge($modules, $extensions);
    }

    /**
     * Get the addon namespace.
     *
     * @param $path
     * @return string
     */
    protected function getAddonNamespace($path)
    {
        $vendor = strtolower(basename(dirname($path)));
        $slug   = strtolower(substr(basename($path), 0, strpos(basename($path), '-')));
        $type   = strtolower(substr(basename($path), strpos(basename($path), '-') + 1));

        return "{$vendor}.{$type}.{$slug}";
    }
}
