<?php namespace Anomaly\Streams\Platform\Model\Files;

use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;

class FilesImagesEntryTranslationsModel extends EntryTranslationsModel
{

    protected $cacheMinutes = 99999;

    protected $table = 'files_images_translations';
}
