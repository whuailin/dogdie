<?php namespace Anomaly\Streams\Platform\Model\Pages;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PagesContentPagePagesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'pages_content_page_pages';

    protected $titleName = 'id';

    protected $rules = [
'content' => '',
];

    protected $fields = [
'content',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Pages\PagesContentPagePagesEntryTranslationsModel';

    protected $stream = [
'id' => '25',
'namespace' => 'pages',
'slug' => 'content_page_pages',
'prefix' => 'pages_',
'title_column' => 'id',
'order_by' => 'id',
'locked' => '0',
'hidden' => '1',
'sortable' => '0',
'searchable' => '0',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '127',
'sort_order' => '127',
'stream_id' => '25',
'field_id' => '41',
'config' => 'a:1:{i:0;s:6:"a:0:{}";}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '41',
'namespace' => 'pages',
'slug' => 'content',
'type' => 'anomaly.field_type.wysiwyg',
'config' => 'a:0:{}',
'locked' => '0',
'translations' => [
[
'id' => '41',
'field_id' => '41',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.content.name',
'placeholder' => 'anomaly.module.pages::field.content.placeholder',
'warning' => 'anomaly.module.pages::field.content.warning',
'instructions' => 'anomaly.module.pages::field.content.instructions',
],
],
],
'translations' => [
[
'id' => '127',
'assignment_id' => '127',
'locale' => 'zh-cn',
'label' => '',
'warning' => '',
'placeholder' => '',
'instructions' => '',
],
],
],
],
'translations' => [
[
'id' => '25',
'stream_id' => '25',
'locale' => 'en',
'name' => 'Content page',
'description' => '',
],
],
];

    
}
