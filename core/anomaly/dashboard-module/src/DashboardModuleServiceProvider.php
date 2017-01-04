<?php namespace Anomaly\DashboardModule;

use Anomaly\DashboardModule\Command\PublishAssets;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class DashboardModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DashboardModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/dashboard'                   => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardsController@index',
        'admin/dashboard/manage'            => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardsController@manage',
        'admin/dashboard/create'            => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardsController@create',
        'admin/dashboard/edit/{id}'         => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardsController@edit',
        'admin/dashboard/view/{dashboard}'  => 'Anomaly\DashboardModule\Http\Controller\Admin\DashboardsController@view',
        'admin/dashboard/widgets'           => 'Anomaly\DashboardModule\Http\Controller\Admin\WidgetsController@index',
        'admin/dashboard/widgets/create'    => 'Anomaly\DashboardModule\Http\Controller\Admin\WidgetsController@create',
        'admin/dashboard/widgets/edit/{id}' => 'Anomaly\DashboardModule\Http\Controller\Admin\WidgetsController@edit',
        'admin/dashboard/widgets/choose'    => 'Anomaly\DashboardModule\Http\Controller\Admin\WidgetsController@choose',
        'admin/dashboard/widgets/save'      => 'Anomaly\DashboardModule\Http\Controller\Admin\WidgetsController@save',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\DashboardModule\Widget\Contract\WidgetRepositoryInterface'       => 'Anomaly\DashboardModule\Widget\WidgetRepository',
        'Anomaly\DashboardModule\Dashboard\Contract\DashboardRepositoryInterface' => 'Anomaly\DashboardModule\Dashboard\DashboardRepository',
    ];
}
