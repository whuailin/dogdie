<?php namespace Anomaly\Streams\Platform\Model\Files;

use Anomaly\Streams\Platform\Entry\EntryModel;

class FilesDocumentsEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'files_documents';

    protected $titleName = '';

    protected $rules = [
];

    protected $fields = [
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Files\FilesDocumentsEntryTranslationsModel';

    protected $stream = [
'slug' => 'documents',
'namespace' => 'files',
'translatable' => '1',
'trashable' => '1',
'locked' => '',
'config' => 'a:0:{}',
'prefix' => 'files_',
'id' => '22',
'assignments' => [
],
'translations' => [
[
'id' => '22',
'stream_id' => '22',
'locale' => 'en',
'name' => 'Documents',
'description' => 'A folder for documents.',
],
],
];

    
}
