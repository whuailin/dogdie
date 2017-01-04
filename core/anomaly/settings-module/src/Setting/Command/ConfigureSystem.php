<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Support\Evaluator;
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
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param AddonCollection            $addons
     * @param Evaluator                  $evaluator
     * @param Repository                 $config
     */
    public function handle(
        SettingRepositoryInterface $settings,
        AddonCollection $addons,
        Evaluator $evaluator,
        Repository $config
    ) {
        /* @var Addon $addon */
        foreach ($addons->withConfig('settings') as $addon) {
            foreach ($config->get($addon->getNamespace('settings')) as $key => $setting) {

                if (isset($setting['env']) && env($setting['env']) !== null) {
                    continue;
                }

                if (!isset($setting['bind'])) {
                    continue;
                }

                $default = array_get($setting, 'config.default_value');

                if (!$settings->has($key = $addon->getNamespace($key)) && !$default) {
                    continue;
                }

                if ($presenter = $settings->presenter($key)) {

                    $config->set($setting['bind'], $presenter->__value());

                    continue;
                }

                $config->set($setting['bind'], $evaluator->evaluate($default));
            }
        }

        foreach ($addons->withConfig('settings/settings') as $addon) {
            foreach ($config->get($addon->getNamespace('settings/settings')) as $key => $setting) {

                if (isset($setting['env']) && env($setting['env']) !== null) {
                    continue;
                }

                if (!isset($setting['bind'])) {
                    continue;
                }

                $default = array_get($setting, 'config.default_value');

                if (!$settings->has($key = $addon->getNamespace($key)) && !$default) {
                    continue;
                }

                if ($presenter = $settings->presenter($key)) {

                    $config->set($setting['bind'], $presenter->__value());

                    continue;
                }

                $config->set($setting['bind'], $evaluator->evaluate($default));
            }
        }

        foreach ($config->get('streams::settings/settings', []) as $key => $setting) {

            if (isset($setting['env']) && env($setting['env']) !== null) {
                continue;
            }

            if (!isset($setting['bind'])) {
                continue;
            }

            $default = array_get($setting, 'config.default_value');

            if (!$settings->has($key = 'streams::' . $key) && !$default) {
                continue;
            }

            if ($presenter = $settings->presenter($key)) {

                $config->set($setting['bind'], $presenter->__value());

                continue;
            }

            $config->set($setting['bind'], $evaluator->evaluate($default));
        }
    }
}
