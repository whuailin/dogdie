<?php namespace Anomaly\Streams\Platform\Model\Pages;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PagesTemplateTypePagesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'pages_template_type_pages';

    protected $titleName = 'id';

    protected $rules = [
'template_edit' => '',
];

    protected $fields = [
'template_edit',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Pages\PagesTemplateTypePagesEntryTranslationsModel';

    protected $stream = [
'id' => '26',
'namespace' => 'pages',
'slug' => 'template_type_pages',
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
'id' => '128',
'sort_order' => '128',
'stream_id' => '26',
'field_id' => '116',
'config' => 'a:1:{i:0;s:6:"a:0:{}";}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '116',
'namespace' => 'pages',
'slug' => 'template_edit',
'type' => 'anomaly.field_type.editor',
'config' => 'a:4:{s:4:"mode";s:4:"twig";s:13:"default_value";N;s:6:"height";s:3:"500";s:9:"word_wrap";s:3:"yes";}',
'locked' => '0',
'translations' => [
[
'id' => '116',
'field_id' => '116',
'locale' => 'zh-cn',
'name' => 'Template Edit',
'placeholder' => '请置入模板内容',
'warning' => '',
'instructions' => '模板文件编辑内容',
],
],
],
'translations' => [
[
'id' => '128',
'assignment_id' => '128',
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
'id' => '26',
'stream_id' => '26',
'locale' => 'en',
'name' => 'Template Type',
'description' => '',
],
],
];

    
}
