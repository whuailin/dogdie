<?php namespace Anomaly\Streams\Platform\Ui\ControlPanel\Component\Navigation;

use Anomaly\Streams\Platform\Support\Collection;
use Anomaly\Streams\Platform\Ui\ControlPanel\Component\Navigation\Contract\NavigationLinkInterface;

/**
 * Class NavigationCollection
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NavigationCollection extends Collection
{

    /**
     * Return the active link.
     *
     * @return null|NavigationLinkInterface
     */
    public function active()
    {
        /* @var NavigationLinkInterface $item */
        foreach ($this->items as $item) {
            if ($item->isActive()) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Get a navigation link.
     *
     * @param  mixed                   $key
     * @param  null                    $default
     * @return NavigationLinkInterface
     */
    public function get($key, $default = null)
    {
        /* @var NavigationLinkInterface $item */
        foreach ($this->items as $item) {
            if ($item->getSlug() == $key) {
                return $item;
            }
        }

        return $default ? $this->get($default) : null;
    }

    /**
     * Return only main.
     *
     * @return NavigationCollection
     */
    public function main()
    {
        $main = config('streams::navigation.main', []);

        if (!$main) {
            return $this->splice(0, 5);
        }

        foreach ($main as &$link) {
            $link = $this->get($link);
        }

        return $this->make(array_filter($main));
    }

    /**
     * Return the home link.
     *
     * @return NavigationLinkInterface|null
     */
    public function home()
    {
        $main = $this->main();

        if ($main->isEmpty()) {
            return $this->first();
        }

        return $main->first();
    }
}
