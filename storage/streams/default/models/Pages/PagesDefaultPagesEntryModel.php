<?php namespace Anomaly\Streams\Platform\Model\Pages;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PagesDefaultPagesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'pages_default_pages';

    protected $titleName = 'id';

    protected $rules = [
'content' => '',
];

    protected $fields = [
'content',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['content'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Pages\PagesDefaultPagesEntryTranslationsModel';

    protected $stream = [
'id' => '23',
'namespace' => 'pages',
'slug' => 'default_pages',
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
'id' => '125',
'sort_order' => '125',
'stream_id' => '23',
'field_id' => '41',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
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
'id' => '125',
'assignment_id' => '125',
'locale' => 'en',
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
'id' => '23',
'stream_id' => '23',
'locale' => 'en',
'name' => 'Default',
'description' => 'A simple page type.',
],
],
];

    
}
