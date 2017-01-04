<?php namespace Anomaly\Streams\Platform\Image;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;

class ImagePaths
{

    /**
     * Predefined paths.
     *
     * @var array
     */
    protected $paths = [];

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The application object.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new ImagePaths instance.
     *
     * @param Repository  $config
     * @param Request     $request
     * @param Application $application
     */
    public function __construct(Repository $config, Request $request, Application $application)
    {
        $this->config      = $config;
        $this->request     = $request;
        $this->application = $application;

        $this->paths = $config->get('streams::images.paths', []);
    }

    /**
     * Get the paths.
     *
     * @return array|mixed
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * Set the paths.
     *
     * @param  array $paths
     * @return $this
     */
    public function setPaths(array $paths)
    {
        $this->paths = $paths;

        return $this;
    }

    /**
     * Add an image path hint.
     *
     * @param $namespace
     * @param $path
     * @return $this
     */
    public function addPath($namespace, $path)
    {
        $this->paths[$namespace] = rtrim($path, '/\\');

        return $this;
    }

    /**
     * Return the real path for a given path.
     *
     * @param $path
     * @return string
     * @throws \Exception
     */
    public function realPath($path)
    {
        if (str_contains($path, '::')) {
            list($namespace, $path) = explode('::', $path);

            if (!isset($this->paths[$namespace])) {
                throw new \Exception("Path hint [{$namespace}::{$path}] does not exist!");
            }

            return rtrim($this->paths[$namespace], '/') . '/' . $path;
        }

        return $path;
    }

    /**
     * Return the output path for an image.
     *
     * @param $path
     * @return string
     */
    public function outputPath(Image $image)
    {
        $path = $image->getImage();

        if ($path instanceof FileInterface) {
            $path = $path->path();
        }

        /*
         * If the path is already public
         * then just use it as it is.
         */
        if (str_contains($path, public_path())) {
            return str_replace(public_path(), '', $path);
        }

        /*
         * If the path is a file or file path then
         * put it in /app/{$application}/files/disk/folder/filename.ext
         */
        if (is_string($path) && str_is('*://*', $path)) {
            $application = $this->application->getReference();

            list($disk, $folder, $filename) = explode('/', str_replace('://', '/', $path));

            if ($rename = $image->getFilename()) {
                $filename = $rename;

                if (strpos($filename, DIRECTORY_SEPARATOR)) {
                    $directory = null;
                }
            }

            return "/app/{$application}/files/{$disk}/{$folder}/{$filename}";
        }

        /*
         * Get the real path relative to our installation.
         */
        $path = str_replace(base_path(), '', $this->realPath($path));

        /*
         * Build out path parts.
         */
        $filename    = basename($path);
        $directory   = ltrim(dirname($path), '/\\') . '/';
        $application = $this->application->getReference();

        if ($image->getAlterations() || $image->getQuality()) {
            $filename = md5(
                    var_export([$path, $image->getAlterations()], true) . $image->getQuality()
                ) . '.' . $image->getExtension();
        }

        if ($rename = $image->getFilename()) {
            $directory = null;
            $filename  = ltrim($rename, '/\\');
        }

        return "/app/{$application}/assets/{$directory}{$filename}";
    }
}
