<?php namespace Anomaly\Streams\Platform\Model\PageLinkType;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class PageLinkTypePagesEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'page_link_type_pages_translations';
}
