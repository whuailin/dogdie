<?php namespace Anomaly\Streams\Platform\Image;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Container\Container;

/**
 * Class ImageMacros
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ImageMacros
{

    /**
     * Registered macros.
     *
     * @var array
     */
    protected $macros;

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new ImageMacros instance.
     *
     * @param Container  $container
     * @param Repository $config
     */
    public function __construct(Repository $config, Container $container)
    {
        $this->macros    = $config->get('streams::images.macros', []);
        $this->container = $container;
    }

    /**
     * Run a macro.
     *
     * @param             $macro
     * @param  Image      $image
     * @return Image
     * @throws \Exception
     */
    public function run($macro, Image $image)
    {
        if (!$process = array_get($this->getMacros(), $macro)) {
            return $image;
        }

        if (is_array($process)) {
            foreach ($process as $method => $arguments) {
                $image->addAlteration($method, $arguments);
            }
        }

        if ($process instanceof \Closure) {
            $this->container->call($process, compact('image', 'macro'));
        }

        return $image;
    }

    /**
     * Get the macros.
     *
     * @return array|mixed
     */
    public function getMacros()
    {
        return $this->macros;
    }

    /**
     * Set the macros.
     *
     * @param  array $macros
     * @return $this
     */
    public function setMacros(array $macros)
    {
        $this->macros = $macros;

        return $this;
    }

    /**
     * Add an image macro hint.
     *
     * @param $namespace
     * @param $macro
     * @return $this
     */
    public function addMacro($macro, $process)
    {
        $this->macros[$macro] = $process;

        return $this;
    }

    /**
     * Return if a macro exists or not.
     *
     * @param $macro
     * @return bool
     */
    public function isMacro($macro)
    {
        return isset($this->macros[$macro]);
    }
}
