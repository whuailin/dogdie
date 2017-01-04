<?php namespace Anomaly\PreferencesModule\Preference\Listener;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Contracts\Config\Repository;

/**
 * Class ConfigureSystem
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigureSystem
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
     * The preferences repository.
     *
     * @var PreferenceRepositoryInterface
     */
    protected $preferences;

    /**
     * Create a new ConfigureSystem instance.
     *
     * @param PreferenceRepositoryInterface $preferences
     * @param AddonCollection               $addons
     * @param Repository                    $config
     */
    public function __construct(PreferenceRepositoryInterface $preferences, AddonCollection $addons, Repository $config)
    {
        $this->config      = $config;
        $this->addons      = $addons;
        $this->preferences = $preferences;
    }


    /**
     * Handle the event.
     */
    public function handle()
    {
        /* @var Addon $addon */
        foreach ($this->addons->withConfig('preferences') as $addon) {
            foreach ($this->config->get($addon->getNamespace('preferences')) as $key => $setting) {

                if (isset($setting['env']) && env($setting['env']) !== null) {
                    continue;
                }

                if (!isset($setting['bind'])) {
                    continue;
                }

                if (!$this->preferences->has($key = $addon->getNamespace($key))) {
                    continue;
                }

                $this->config->set($setting['bind'], $this->preferences->presenter($key)->__value);
            }
        }

        foreach ($this->addons->withConfig('preferences/preferences') as $addon) {
            foreach ($this->config->get($addon->getNamespace('preferences/preferences')) as $key => $setting) {

                if (isset($setting['env']) && env($setting['env']) !== null) {
                    continue;
                }

                if (!isset($setting['bind'])) {
                    continue;
                }

                if (!$this->preferences->has($key = $addon->getNamespace($key))) {
                    continue;
                }

                $this->config->set($setting['bind'], $this->preferences->presenter($key)->__value);
            }
        }

        foreach ($this->config->get('streams::preferences/preferences', []) as $key => $setting) {

            if (isset($setting['env']) && env($setting['env']) !== null) {
                continue;
            }

            if (!isset($setting['bind'])) {
                continue;
            }

            if (!$this->preferences->has($key = 'streams::' . $key)) {
                continue;
            }

            $this->config->set($setting['bind'], $this->preferences->presenter($key)->__value);
        }
    }
}
