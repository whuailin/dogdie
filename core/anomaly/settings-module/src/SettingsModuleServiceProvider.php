<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Command\ConfigureSystem;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;

/**
 * Class SettingsModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SettingsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\SettingsModule\SettingsModulePlugin',
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\SettingsModule\Setting\Event\SettingsWereSaved'                 => [
            'Anomaly\SettingsModule\Setting\Listener\UpdateMaintenanceMode',
        ],
        'Anomaly\Streams\Platform\Addon\Module\Event\ModuleWasUninstalled'       => [
            'Anomaly\SettingsModule\Setting\Listener\DeleteModuleSettings',
        ],
        'Anomaly\Streams\Platform\Addon\Extension\Event\ExtensionWasUninstalled' => [
            'Anomaly\SettingsModule\Setting\Listener\DeleteExtensionSettings',
        ],
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/settings'                => 'Anomaly\SettingsModule\Http\Controller\Admin\SystemController@edit',
        'admin/settings/{type}'         => 'Anomaly\SettingsModule\Http\Controller\Admin\AddonsController@index',
        'admin/settings/{type}/{addon}' => 'Anomaly\SettingsModule\Http\Controller\Admin\AddonsController@edit',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel' => 'Anomaly\SettingsModule\Setting\SettingModel',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface' => 'Anomaly\SettingsModule\Setting\SettingRepository',
    ];

    /**
     * Configure Streams.
     *
     * @param Application $application
     */
    public function boot(Application $application)
    {
        if (!$application->isInstalled()) {
            return;
        }

        $this->dispatch(new ConfigureSystem());
    }

}
