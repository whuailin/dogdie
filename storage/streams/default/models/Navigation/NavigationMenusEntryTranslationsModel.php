<?php namespace Anomaly\Streams\Platform\Model\Navigation;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class NavigationMenusEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'navigation_menus_translations';
}
