<?php namespace Anomaly\Streams\Platform\Model\UrlLinkType;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class UrlLinkTypeUrlsEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'url_link_type_urls_translations';
}
