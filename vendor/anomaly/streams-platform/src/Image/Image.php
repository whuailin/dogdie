<?php namespace Anomaly\Streams\Platform\Image;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FilesModule\File\FilePresenter;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Routing\UrlGenerator;
use Closure;
use Collective\Html\HtmlBuilder;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManager;
use League\Flysystem\File;
use League\Flysystem\MountManager;
use Mobile_Detect;
use Robbo\Presenter\Presenter;

/**
 * Class Image
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class Image
{

    /**
     * The publish flag.
     *
     * @var bool
     */
    protected $publish = false;

    /**
     * The publishable base directory.
     *
     * @var null
     */
    protected $directory = null;

    /**
     * The image object.
     *
     * @var null|string
     */
    protected $image = null;

    /**
     * The file extension.
     *
     * @var null|string
     */
    protected $extension = null;

    /**
     * The desired filename.
     *
     * @var null|string
     */
    protected $filename = null;

    /**
     * The default output method.
     *
     * @var string
     */
    protected $output = 'url';

    /**
     * The image attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Applied alterations.
     *
     * @var array
     */
    protected $alterations = [];

    /**
     * Image srcsets.
     *
     * @var array
     */
    protected $srcsets = [];

    /**
     * Image sources.
     *
     * @var array
     */
    protected $sources = [];

    /**
     * Allowed methods.
     *
     * @var array
     */
    protected $allowedMethods = [
        'blur',
        'brightness',
        'colorize',
        'resizeCanvas',
        'contrast',
        'crop',
        'encode',
        'fit',
        'flip',
        'gamma',
        'greyscale',
        'heighten',
        'insert',
        'invert',
        'limitColors',
        'pixelate',
        'opacity',
        'resize',
        'rotate',
        'amount',
        'widen',
        'orientate',
    ];

    /**
     * The quality of the output.
     *
     * @var null|int
     */
    protected $quality = null;

    /**
     * The image width.
     *
     * @var null|int
     */
    protected $width = null;

    /**
     * The image height.
     *
     * @var null|int
     */
    protected $height = null;

    /**
     * The URL generator.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * Image path hints by namespace.
     *
     * @var ImagePaths
     */
    protected $paths;

    /**
     * The image macros.
     *
     * @var ImageMacros
     */
    protected $macros;

    /**
     * The file system.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * The user agent utility.
     *
     * @var Mobile_Detect
     */
    protected $agent;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The image manager.
     *
     * @var ImageManager
     */
    protected $manager;

    /**
     * The stream application.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new Image instance.
     *
     * @param UrlGenerator  $url
     * @param HtmlBuilder   $html
     * @param Filesystem    $files
     * @param Mobile_Detect $agent
     * @param Repository    $config
     * @param ImageManager  $manager
     * @param Application   $application
     * @param ImagePaths    $paths
     * @param ImageMacros   $macros
     */
    public function __construct(
        UrlGenerator $url,
        HtmlBuilder $html,
        Filesystem $files,
        Mobile_Detect $agent,
        Repository $config,
        ImageManager $manager,
        Application $application,
        ImagePaths $paths,
        ImageMacros $macros
    ) {
        $this->url         = $url;
        $this->html        = $html;
        $this->files       = $files;
        $this->agent       = $agent;
        $this->paths       = $paths;
        $this->config      = $config;
        $this->macros      = $macros;
        $this->manager     = $manager;
        $this->application = $application;
    }

    /**
     * Make a new image instance.
     *
     * @param  mixed $image
     * @param  null  $output
     * @return $this
     */
    public function make($image, $output = null)
    {
        if ($image instanceof Image) {
            return $image;
        }

        if ($output) {
            $this->setOutput($output);
        }

        $clone = clone($this);

        $clone->setAlterations([]);
        $clone->setSources([]);
        $clone->setSrcsets([]);
        $clone->setImage(null);

        try {
            return $clone->setImage($image);
        } catch (\Exception $e) {
            return $this;
        }
    }

    /**
     * Return the path to an image.
     *
     * @return string
     */
    public function path()
    {
        $path = $this->getCachePath();

        return $path;
    }

    /**
     * Return the asset path to an image.
     *
     * @return string
     */
    public function asset()
    {
        $path = $this->getCachePath();

        return $this->url->asset($path);
    }

    /**
     * Run a macro on the image.
     *
     * @param $macro
     * @return Image
     * @throws \Exception
     */
    public function macro($macro)
    {
        return $this->macros->run($macro, $this);
    }

    /**
     * Return the URL to an image.
     *
     * @param  array $parameters
     * @param  null  $secure
     * @return string
     */
    public function url(array $parameters = [], $secure = null)
    {
        return $this->url->asset($this->path(), $parameters, $secure);
    }

    /**
     * Return the image tag to an image.
     *
     * @param  null  $alt
     * @param  array $attributes
     * @return string
     */
    public function image($alt = null, array $attributes = [])
    {
        if (!$alt) {
            $alt = array_get($this->getAttributes(), 'alt');
        }

        $attributes = array_merge($this->getAttributes(), $attributes);

        if ($srcset = $this->srcset()) {
            $attributes['srcset'] = $srcset;
        }

        $attributes['alt'] = $alt;

        return '<img src="' . $this->asset() . '"' . $this->html->attributes($attributes) . '>';
    }

    /**
     * Return the image tag to an image.
     *
     * @param  null  $alt
     * @param  array $attributes
     * @return string
     */
    public function img($alt = null, array $attributes = [])
    {
        return $this->image($alt, $attributes);
    }

    /**
     * Return a picture tag.
     *
     * @return string
     */
    public function picture(array $attributes = [])
    {
        $sources = [];

        $attributes = array_merge($this->getAttributes(), $attributes);

        /* @var Image $image */
        foreach ($this->getSources() as $media => $image) {
            if ($media != 'fallback') {
                $sources[] = $image->source();
            } else {
                $sources[] = $image->image();
            }
        }

        $sources = implode("\n", $sources);

        $attributes = $this->html->attributes($attributes);

        return "<picture {$attributes}>\n{$sources}\n</picture>";
    }

    /**
     * Return a source tag.
     *
     * @return string
     */
    public function source()
    {
        $this->addAttribute('srcset', $this->srcset() ?: $this->asset() . ' 2x, ' . $this->asset() . ' 1x');

        $attributes = $this->html->attributes($this->getAttributes());

        if ($srcset = $this->srcset()) {
            $attributes['srcset'] = $srcset;
        }

        return "<source {$attributes}>";
    }

    /**
     * Return the image response.
     *
     * @param  null $format
     * @param  int  $quality
     * @return String
     */
    public function encode($format = null, $quality = null)
    {
        return $this->manager->make($this->getCachePath())->encode($format, $quality ?: $this->getQuality());
    }

    /**
     * Return the image contents.
     *
     * @return string
     */
    public function data()
    {
        return $this->dumpImage();
    }

    /**
     * Return the output.
     *
     * @return string
     */
    public function output()
    {
        return $this->{$this->output}();
    }

    /**
     * Set the filename.
     *
     * @param $filename
     * @return $this
     */
    public function rename($filename = null)
    {
        return $this->setFilename($filename);
    }

    /**
     * Set the quality.
     *
     * @param $quality
     * @return $this
     */
    public function quality($quality)
    {
        return $this->setQuality($quality);
    }

    /**
     * Set the width attribute.
     *
     * @param  null $width
     * @return Image
     */
    public function width($width = null)
    {
        return $this->addAttribute('width', $width ?: $this->getWidth());
    }

    /**
     * Set the height attribute.
     *
     * @param  null $height
     * @return Image
     */
    public function height($height = null)
    {
        return $this->addAttribute('height', $height ?: $this->getHeight());
    }

    /**
     * Set the quality.
     *
     * @param $quality
     * @return $this
     */
    public function setQuality($quality)
    {
        $this->quality = (int)$quality;

        return $this;
    }

    /**
     * Get the cache path of the image.
     *
     * @return string
     */
    protected function getCachePath()
    {
        if (starts_with($this->getImage(), ['http://', 'https://', '//'])) {
            return $this->getImage();
        }

        $path = $this->paths->outputPath($this);

        try {
            if ($this->shouldPublish($path)) {
                $this->publish($path);
            }
        } catch (\Exception $e) {
            return $this->config->get('app.debug', false) ? $e->getMessage() : null;
        }

        return $path;
    }

    /**
     * Determine if the image needs to be published
     *
     * @param $path
     * @return bool
     */
    private function shouldPublish($path)
    {
        $path = ltrim($path, '/');

        if (!$this->files->exists($path)) {
            return true;
        }

        if (is_string($this->image) && !str_is('*://*', $this->image) && filemtime($path) < filemtime($this->image)) {
            return true;
        }

        if (is_string($this->image) && str_is('*://*', $this->image) && filemtime($path) < app(
                'League\Flysystem\MountManager'
            )->getTimestamp($this->image)
        ) {
            return true;
        }

        if ($this->image instanceof File && filemtime($path) < $this->image->getTimestamp()) {
            return true;
        }

        if ($this->image instanceof FileInterface && filemtime($path) < $this->image->lastModified()->format('U')) {
            return true;
        }

        return false;
    }

    /**
     * Publish an image to the publish directory.
     *
     * @param $path
     */
    protected function publish($path)
    {
        $path = ltrim($path, '/');

        $this->files->makeDirectory((new \SplFileInfo($path))->getPath(), 0777, true, true);

        if (!$this->supportsType($this->getExtension())) {

            $this->files->put($path, $this->dumpImage());

            return;
        }

        if (!$image = $this->makeImage()) {
            return;
        }

        if (function_exists('exif_read_data') && $image->exif('Orientation') && $image->exif('Orientation') > 1) {
            $this->addAlteration('orientate');
        }

        if (!$this->getAlterations() && $content = $this->dumpImage()) {
            $this->files->put($this->directory . $path, $content);

            return;
        }

        if (is_callable('exif_read_data') && in_array('orientate', $this->getAlterations())) {
            $this->setAlterations(array_unique(array_merge(['orientate'], $this->getAlterations())));
        }

        foreach ($this->getAlterations() as $method => $arguments) {
            if ($method == 'resize') {
                $this->guessResizeArguments($arguments);
            }

            if (in_array($method, $this->getAllowedMethods())) {
                if (is_array($arguments)) {
                    call_user_func_array([$image, $method], $arguments);
                } else {
                    call_user_func([$image, $method], $arguments);
                }
            }
        }

        $image->save($this->directory . $path, $this->getQuality());
    }

    /**
     * Set an attribute value.
     *
     * @param $attribute
     * @param $value
     * @return $this
     */
    public function attr($attribute, $value)
    {
        array_set($this->attributes, $attribute, $value);

        return $this;
    }

    /**
     * Return the image srcsets by set.
     *
     * @return array
     */
    public function srcset()
    {
        $sources = [];

        /* @var Image $image */
        foreach ($this->getSrcsets() as $descriptor => $image) {
            $sources[] = $image->asset() . ' ' . $descriptor;
        }

        return implode(', ', $sources);
    }

    /**
     * Set the srcsets/alterations.
     *
     * @param array $srcsets
     */
    public function srcsets(array $srcsets)
    {
        foreach ($srcsets as $descriptor => &$alterations) {
            $image = $this->make(array_pull($alterations, 'image', $this->getImage()))->setOutput('url');

            foreach ($alterations as $method => $arguments) {
                if (is_array($arguments)) {
                    call_user_func_array([$image, $method], $arguments);
                } else {
                    call_user_func([$image, $method], $arguments);
                }
            }

            $alterations = $image;
        }

        $this->setSrcsets($srcsets);

        return $this;
    }

    /**
     * Set the sources/alterations.
     *
     * @param  array $sources
     * @param  bool  $merge
     * @return $this
     */
    public function sources(array $sources, $merge = true)
    {
        foreach ($sources as $media => &$alterations) {
            if ($merge) {
                $alterations = array_merge($this->getAlterations(), $alterations);
            }

            $image = $this->make(array_pull($alterations, 'image', $this->getImage()))->setOutput('source');

            if ($media != 'fallback') {
                call_user_func([$image, 'media'], $media);
            }

            foreach ($alterations as $method => $arguments) {
                if (is_array($arguments)) {
                    call_user_func_array([$image, $method], $arguments);
                } else {
                    call_user_func([$image, $method], $arguments);
                }
            }

            $alterations = $image;
        }

        $this->setSources($sources);

        return $this;
    }

    /**
     * Alter the image based on the user agents.
     *
     * @param  array $agents
     * @param  bool  $exit
     * @return $this
     */
    public function agents(array $agents, $exit = false)
    {
        foreach ($agents as $agent => $alterations) {
            if (
                $this->agent->is($agent)
                || ($agent == 'phone' && $this->agent->isPhone())
                || ($agent == 'mobile' && $this->agent->isMobile())
                || ($agent == 'tablet' && $this->agent->isTablet())
                || ($agent == 'desktop' && $this->agent->isDesktop())
            ) {
                foreach ($alterations as $method => $arguments) {
                    if (is_array($arguments)) {
                        call_user_func_array([$this, $method], $arguments);
                    } else {
                        call_user_func([$this, $method], $arguments);
                    }
                }

                if ($exit) {
                    return $this;
                }
            }
        }

        return $this;
    }

    /**
     * Return if an extension is supported.
     *
     * @param $extension
     * @return bool
     */
    protected function supportsType($extension)
    {
        return !in_array($extension, ['svg', 'webp']);
    }

    /**
     * Set the image.
     *
     * @param  $image
     * @return $this
     */
    public function setImage($image)
    {
        if ($image instanceof Presenter) {
            $image = $image->getObject();
        }

        if ($image instanceof FieldType) {
            $image = $image->getValue();
        }

        // Replace path prefixes.
        if (is_string($image) && str_contains($image, '::')) {
            $image = $this->paths->realPath($image);

            $this->setExtension(pathinfo($image, PATHINFO_EXTENSION));

            $size = getimagesize($image);

            $this->setWidth(array_get($size, 0));
            $this->setHeight(array_get($size, 1));
        }

        if (is_string($image) && str_is('*://*', $image) && !starts_with($image, ['http', 'https'])) {
            $this->setExtension(pathinfo($image, PATHINFO_EXTENSION));
        }

        if ($image instanceof FileInterface) {

            /* @var FileInterface $image */
            $this->setExtension($image->getExtension());

            $this->setWidth($image->getWidth());
            $this->setHeight($image->getHeight());
        }

        if ($image instanceof FilePresenter) {

            /* @var FilePresenter|FileInterface $image */
            $image = $image->getObject();

            $this->setExtension($image->getExtension());

            $this->setWidth($image->getWidth());
            $this->setHeight($image->getHeight());
        }

        $this->image = $image;

        return $this;
    }

    /**
     * Make an image instance.
     *
     * @return \Intervention\Image\Image
     */
    protected function makeImage()
    {
        if ($this->image instanceof FileInterface) {
            return $this->manager->make(app(MountManager::class)->read($this->image->location()));
        }

        if (is_string($this->image) && str_is('*://*', $this->image)) {
            return $this->manager->make(app(MountManager::class)->read($this->image));
        }

        if ($this->image instanceof File) {
            return $this->manager->make($this->image->read());
        }

        if (is_string($this->image) && file_exists($this->image)) {
            return $this->manager->make($this->image);
        }

        if ($this->image instanceof Image) {
            return $this->image;
        }

        return null;
    }

    /**
     * Dump an image instance's data.
     *
     * @return string
     */
    protected function dumpImage()
    {
        if ($this->image instanceof FileInterface) {
            return app('League\Flysystem\MountManager')->read($this->image->location());
        }

        if (is_string($this->image) && str_is('*://*', $this->image) && !starts_with($this->image, ['http', '//'])) {
            return app('League\Flysystem\MountManager')->read($this->image);
        }

        if (is_string($this->image) && (file_exists($this->image) || starts_with($this->image, ['http', '//']))) {
            return file_get_contents($this->image);
        }

        if (is_string($this->image) && file_exists($this->image)) {
            return file_get_contents($this->image);
        }

        if ($this->image instanceof File) {
            return $this->image->read();
        }

        if ($this->image instanceof Image) {
            return $this->image->encode();
        }

        if (is_string($this->image) && file_exists($this->image)) {
            return file_get_contents($this->image);
        }

        return null;
    }

    /**
     * Get the image instance.
     *
     * @return \Intervention\Image\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the file name.
     *
     * @return null|string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the file name.
     *
     * @param $filename
     * @return $this
     */
    public function setFilename($filename = null)
    {
        if (!$filename) {
            $filename = $this->getImageFilename();
        }

        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the alterations.
     *
     * @return array
     */
    public function getAlterations()
    {
        return $this->alterations;
    }

    /**
     * Set the alterations.
     *
     * @param  array $alterations
     * @return $this
     */
    public function setAlterations(array $alterations)
    {
        $this->alterations = $alterations;

        return $this;
    }

    /**
     * Add an alteration.
     *
     * @param  $method
     * @param  $arguments
     * @return $this
     */
    public function addAlteration($method, $arguments = [])
    {
        $this->alterations[$method] = $arguments;

        return $this;
    }

    /**
     * Get the attributes.
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set the attributes.
     *
     * @param  array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Add an attribute.
     *
     * @param  $attribute
     * @param  $value
     * @return $this
     */
    protected function addAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;

        return $this;
    }

    /**
     * Get the srcsets.
     *
     * @return array
     */
    public function getSrcsets()
    {
        return $this->srcsets;
    }

    /**
     * Set the srcsets.
     *
     * @param  array $srcsets
     * @return $this
     */
    public function setSrcsets(array $srcsets)
    {
        $this->srcsets = $srcsets;

        return $this;
    }

    /**
     * Get the sources.
     *
     * @return array
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * Set the sources.
     *
     * @param  array $sources
     * @return $this
     */
    public function setSources(array $sources)
    {
        $this->sources = $sources;

        return $this;
    }

    /**
     * Get the quality.
     *
     * @param  null $default
     * @return int
     */
    public function getQuality($default = null)
    {
        if (!$default) {
            $this->config->get('streams::images.quality', 80);
        }

        return $this->quality ?: $default;
    }

    /**
     * Set the output mode.
     *
     * @param $output
     * @return $this
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Get the extension.
     *
     * @return null|string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set the extension.
     *
     * @param $extension
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get the allowed methods.
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }

    /**
     * Add a path by it's namespace hint.
     *
     * @param $namespace
     * @param $path
     * @return $this
     */
    public function addPath($namespace, $path)
    {
        $this->paths->addPath($namespace, $path);

        return $this;
    }


    /**
     * Get the width.
     *
     * @return int|null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the width.
     *
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the height.
     *
     * @return int|null
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the height.
     *
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Guess the resize callback value
     * from a boolean.
     *
     * @param array $arguments
     */
    protected function guessResizeArguments(array &$arguments)
    {
        $arguments = array_pad($arguments, 3, null);

        if (end($arguments) instanceof \Closure) {
            return;
        }

        if (array_pop($arguments) !== false && (is_null($arguments[0]) || is_null($arguments[1]))) {
            $arguments[] = function (Constraint $constraint) {
                $constraint->aspectRatio();
            };
        }
    }

    /**
     * Return the output.
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->output();
    }

    /**
     * If the method does not exist then
     * add an attribute and return.
     *
     * @param $name
     * @param $arguments
     * @return $this|mixed
     */
    public function __call($name, $arguments)
    {
        if (in_array($name, $this->getAllowedMethods())) {
            return $this->addAlteration($name, $arguments);
        }

        if ($this->macros->isMacro($macro = snake_case($name))) {
            return $this->macro($macro);
        }

        if (!method_exists($this, $name)) {
            array_set($this->attributes, $name, array_shift($arguments));

            return $this;
        }

        return call_user_func_array([$this, $name], $arguments);
    }
}
