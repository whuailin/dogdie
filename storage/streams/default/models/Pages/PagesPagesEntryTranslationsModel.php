<?php namespace Anomaly\Streams\Platform\Model\Pages;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class PagesPagesEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'pages_pages_translations';
}
