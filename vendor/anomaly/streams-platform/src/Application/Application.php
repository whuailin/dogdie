<?php namespace Anomaly\Streams\Platform\Application;

use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class Application
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class Application
{

    use DispatchesJobs;

    /**
     * The application locale.
     *
     * @var string
     */
    protected $locale = null;

    /**
     * The enabled state of the application.
     *
     * @var bool
     */
    protected $enabled = null;

    /**
     * Keep installed status around.
     *
     * @var bool
     */
    protected $installed = null;

    /**
     * The application reference.
     *
     * @var string
     */
    protected $reference = 'default';

    /**
     * The application repository.
     *
     * @var ApplicationRepository
     */
    protected $applications;

    /**
     * Create a new Application instance.
     *
     * @param ApplicationRepository $model
     */
    public function __construct(ApplicationRepository $applications)
    {
        $this->applications = $applications;

        $this->reference = env('DEFAULT_REFERENCE', $this->reference);
    }

    /**
     * Setup the application.
     */
    public function setup()
    {
        $this->setTablePrefix();
    }

    /**
     * Set the database table prefix going forward.
     * We really don't need a core table from here on out.
     */
    public function setTablePrefix()
    {
        app('db')->getSchemaBuilder()->getConnection()->setTablePrefix($this->getReference() . '_');
        app('db')->getSchemaBuilder()->getConnection()->getSchemaGrammar()->setTablePrefix($this->getReference() . '_');
    }

    /**
     * Get the reference.
     *
     * @return null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the reference.
     *
     * @param $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the storage path for the application.
     *
     * @param  string $path
     * @return string
     */
    public function getStoragePath($path = '')
    {
        return storage_path('streams/' . $this->getReference()) . ($path ? '/' . $path : $path);
    }

    /**
     * Get the public assets path for the application.
     *
     * @param  string $path
     * @return string
     */
    public function getAssetsPath($path = '')
    {
        return public_path('app/' . $this->getReference()) . ($path ? '/' . $path : $path);
    }

    /**
     * Get the resources path for the application.
     *
     * @param  string $path
     * @return string
     */
    public function getResourcesPath($path = '')
    {
        return base_path('resources/' . $this->getReference()) . ($path ? '/' . $path : $path);
    }

    /**
     * Return the app reference.
     *
     * @return string
     */
    public function tablePrefix()
    {
        return $this->reference . '_';
    }

    /**
     * Locate the app by request or passed
     * variable and set the application reference.
     *
     * @return bool
     */
    public function locate()
    {
        if ($app = $this->applications->findByDomain(app('request')->root())) {

            $this->installed = true;
            $this->locale    = $app->locale;
            $this->enabled   = $app->enabled;
            $this->reference = $app->reference;

            return true;
        }

        return false;
    }

    /**
     * Get the resolved locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Return if the application is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        if (is_null($this->enabled)) {
            return true;
        }

        return $this->enabled;
    }

    /**
     * Is the application installed?
     *
     * @return bool
     */
    public function isInstalled()
    {
        if (is_null($this->installed)) {
            $this->installed = file_exists(base_path('.env'));
        }

        return $this->installed;
    }
}
