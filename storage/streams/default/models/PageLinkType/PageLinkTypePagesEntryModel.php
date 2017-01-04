<?php namespace Anomaly\Streams\Platform\Model\PageLinkType;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PageLinkTypePagesEntryModel extends EntryModel
{

    

    protected $searchable = false;

    protected $table = 'page_link_type_pages';

    protected $titleName = 'title';

    protected $rules = [
'title' => '',
'page' => 'required',
'description' => '',
];

    protected $fields = [
'title',
'page',
'description',
];

    protected $dates = ['created_at', 'updated_at'];

    protected $relationships = ['page'];

    protected $translatedAttributes = ['title', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\PageLinkType\PageLinkTypePagesEntryTranslationsModel';

    protected $stream = [
'id' => '19',
'namespace' => 'page_link_type',
'slug' => 'pages',
'prefix' => 'page_link_type_',
'title_column' => 'title',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '0',
'searchable' => '0',
'trashable' => '0',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '119',
'sort_order' => '119',
'stream_id' => '19',
'field_id' => '110',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '110',
'namespace' => 'page_link_type',
'slug' => 'title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '110',
'field_id' => '110',
'locale' => 'en',
'name' => 'anomaly.extension.page_link_type::field.title.name',
'placeholder' => 'anomaly.extension.page_link_type::field.title.placeholder',
'warning' => 'anomaly.extension.page_link_type::field.title.warning',
'instructions' => 'anomaly.extension.page_link_type::field.title.instructions',
],
],
],
'translations' => [
[
'id' => '119',
'assignment_id' => '119',
'locale' => 'en',
'label' => 'anomaly.extension.page_link_type::field.title.label.pages',
'warning' => 'anomaly.extension.page_link_type::field.title.warning.pages',
'placeholder' => 'anomaly.extension.page_link_type::field.title.placeholder.pages',
'instructions' => 'anomaly.extension.page_link_type::field.title.instructions.pages',
],
],
],
[
'id' => '120',
'sort_order' => '120',
'stream_id' => '19',
'field_id' => '111',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '111',
'namespace' => 'page_link_type',
'slug' => 'page',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:2:{s:4:"mode";s:6:"lookup";s:7:"related";s:34:"Anomaly\PagesModule\Page\PageModel";}',
'locked' => '1',
'translations' => [
[
'id' => '111',
'field_id' => '111',
'locale' => 'en',
'name' => 'anomaly.extension.page_link_type::field.page.name',
'placeholder' => 'anomaly.extension.page_link_type::field.page.placeholder',
'warning' => 'anomaly.extension.page_link_type::field.page.warning',
'instructions' => 'anomaly.extension.page_link_type::field.page.instructions',
],
],
],
'translations' => [
[
'id' => '120',
'assignment_id' => '120',
'locale' => 'en',
'label' => 'anomaly.extension.page_link_type::field.page.label.pages',
'warning' => 'anomaly.extension.page_link_type::field.page.warning.pages',
'placeholder' => 'anomaly.extension.page_link_type::field.page.placeholder.pages',
'instructions' => 'anomaly.extension.page_link_type::field.page.instructions.pages',
],
],
],
[
'id' => '121',
'sort_order' => '121',
'stream_id' => '19',
'field_id' => '112',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '112',
'namespace' => 'page_link_type',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '112',
'field_id' => '112',
'locale' => 'en',
'name' => 'anomaly.extension.page_link_type::field.description.name',
'placeholder' => 'anomaly.extension.page_link_type::field.description.placeholder',
'warning' => 'anomaly.extension.page_link_type::field.description.warning',
'instructions' => 'anomaly.extension.page_link_type::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '121',
'assignment_id' => '121',
'locale' => 'en',
'label' => 'anomaly.extension.page_link_type::field.description.label.pages',
'warning' => 'anomaly.extension.page_link_type::field.description.warning.pages',
'placeholder' => 'anomaly.extension.page_link_type::field.description.placeholder.pages',
'instructions' => 'anomaly.extension.page_link_type::field.description.instructions.pages',
],
],
],
],
'translations' => [
[
'id' => '19',
'stream_id' => '19',
'locale' => 'en',
'name' => 'anomaly.extension.page_link_type::stream.pages.name',
'description' => 'anomaly.extension.page_link_type::stream.pages.description',
],
],
];

    
public function page()
{

return $this->getFieldType('page')->getRelation();
}

}
