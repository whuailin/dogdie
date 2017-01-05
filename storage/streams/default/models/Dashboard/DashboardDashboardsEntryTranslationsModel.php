<?php namespace Anomaly\Streams\Platform\Model\Dashboard;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class DashboardDashboardsEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'dashboard_dashboards_translations';
}
