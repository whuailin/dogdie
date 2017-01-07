<?php namespace Dogdie\BlogTheme;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class BlogThemeServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $commands = [];

    protected $routes = [
        '/' => 'Dogdie\BlogTheme\BlogTheme@index',
    ];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

    public function register()
    {
    }

    public function map()
    {
    }

}
