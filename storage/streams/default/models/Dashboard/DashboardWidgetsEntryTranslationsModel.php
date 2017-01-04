<?php namespace Anomaly\Streams\Platform\Model\Dashboard;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class DashboardWidgetsEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'dashboard_widgets_translations';
}
