<?php namespace Anomaly\Streams\Platform\Support;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Contracts\Config\Repository;

/**
 * Class Locator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Locator
{

    /**
     * The addon collection.
     *
     * @var AddonCollection
     */
    protected $addons;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new Locator instance.
     *
     * @param AddonCollection $addons
     * @param Repository      $config
     */
    public function __construct(AddonCollection $addons, Repository $config)
    {
        $this->addons = $addons;
        $this->config = $config;
    }

    /**
     * Locate the addon containing an object.
     * Returns the addon's dot namespace.
     *
     * @param $object
     * @return null|string
     */
    public function locate($object)
    {
        if (!is_object($object)) {
            return null;
        }

        $class = explode('\\', get_class($object));

        $vendor = snake_case(array_shift($class));
        $addon  = snake_case(array_shift($class));

        foreach ($this->config->get('streams::addons.types') as $type) {
            if (ends_with($addon, $type)) {
                $addon = str_replace('_' . $type, '', $addon);

                $namespace = "{$vendor}.{$type}.{$addon}";

                return $this->addons->has($namespace) ? $namespace : null;
            }
        }

        return null;
    }

    /**
     * Return the located addon instance.
     *
     * @param $object
     * @return \Anomaly\Streams\Platform\Addon\Addon|mixed|null
     */
    public function resolve($object)
    {
        if (!$namespace = $this->locate($object)) {
            return null;
        }

        return $this->addons->get($namespace);
    }
}
