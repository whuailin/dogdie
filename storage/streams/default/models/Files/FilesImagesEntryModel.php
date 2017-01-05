<?php namespace Anomaly\Streams\Platform\Model\Files;

use Anomaly\Streams\Platform\Entry\EntryModel;

class FilesImagesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'files_images';

    protected $titleName = 'id';

    protected $rules = [
];

    protected $fields = [
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Files\FilesImagesEntryTranslationsModel';

    protected $stream = [
'id' => '21',
'namespace' => 'files',
'slug' => 'images',
'prefix' => 'files_',
'title_column' => 'id',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '0',
'searchable' => '0',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
],
'translations' => [
[
'id' => '21',
'stream_id' => '21',
'locale' => 'en',
'name' => 'Images',
'description' => 'A folder for images.',
],
],
];

    
}
