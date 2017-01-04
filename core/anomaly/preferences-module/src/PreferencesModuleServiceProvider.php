<?php namespace Anomaly\PreferencesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class PreferencesModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PreferencesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\PreferencesModule\PreferencesModulePlugin',
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Event\Response' => [
            'Anomaly\PreferencesModule\Preference\Listener\ConfigureSystem',
        ],
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/preferences'                => 'Anomaly\PreferencesModule\Http\Controller\Admin\SystemController@edit',
        'admin/preferences/{type}'         => 'Anomaly\PreferencesModule\Http\Controller\Admin\AddonsController@index',
        'admin/preferences/{type}/{addon}' => 'Anomaly\PreferencesModule\Http\Controller\Admin\AddonsController@edit',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Preferences\PreferencesPreferencesEntryModel' => 'Anomaly\PreferencesModule\Preference\PreferenceModel',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface' => 'Anomaly\PreferencesModule\Preference\PreferenceRepository',
    ];
}
