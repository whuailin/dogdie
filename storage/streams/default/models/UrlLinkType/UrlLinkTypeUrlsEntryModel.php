<?php namespace Anomaly\Streams\Platform\Model\UrlLinkType;

use Anomaly\Streams\Platform\Entry\EntryModel;

class UrlLinkTypeUrlsEntryModel extends EntryModel
{

    

    protected $searchable = false;

    protected $table = 'url_link_type_urls';

    protected $titleName = 'title';

    protected $rules = [
'title' => 'required',
'url' => 'required',
'description' => '',
];

    protected $fields = [
'title',
'url',
'description',
];

    protected $dates = ['created_at', 'updated_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['title', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\UrlLinkType\UrlLinkTypeUrlsEntryTranslationsModel';

    protected $stream = [
'id' => '20',
'namespace' => 'url_link_type',
'slug' => 'urls',
'prefix' => 'url_link_type_',
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
'id' => '122',
'sort_order' => '122',
'stream_id' => '20',
'field_id' => '113',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '113',
'namespace' => 'url_link_type',
'slug' => 'title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '113',
'field_id' => '113',
'locale' => 'en',
'name' => 'anomaly.extension.url_link_type::field.title.name',
'placeholder' => 'anomaly.extension.url_link_type::field.title.placeholder',
'warning' => 'anomaly.extension.url_link_type::field.title.warning',
'instructions' => 'anomaly.extension.url_link_type::field.title.instructions',
],
],
],
'translations' => [
[
'id' => '122',
'assignment_id' => '122',
'locale' => 'en',
'label' => 'anomaly.extension.url_link_type::field.title.label.urls',
'warning' => 'anomaly.extension.url_link_type::field.title.warning.urls',
'placeholder' => 'anomaly.extension.url_link_type::field.title.placeholder.urls',
'instructions' => 'anomaly.extension.url_link_type::field.title.instructions.urls',
],
],
],
[
'id' => '123',
'sort_order' => '123',
'stream_id' => '20',
'field_id' => '114',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '114',
'namespace' => 'url_link_type',
'slug' => 'url',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '114',
'field_id' => '114',
'locale' => 'en',
'name' => 'anomaly.extension.url_link_type::field.url.name',
'placeholder' => 'anomaly.extension.url_link_type::field.url.placeholder',
'warning' => 'anomaly.extension.url_link_type::field.url.warning',
'instructions' => 'anomaly.extension.url_link_type::field.url.instructions',
],
],
],
'translations' => [
[
'id' => '123',
'assignment_id' => '123',
'locale' => 'en',
'label' => 'anomaly.extension.url_link_type::field.url.label.urls',
'warning' => 'anomaly.extension.url_link_type::field.url.warning.urls',
'placeholder' => 'anomaly.extension.url_link_type::field.url.placeholder.urls',
'instructions' => 'anomaly.extension.url_link_type::field.url.instructions.urls',
],
],
],
[
'id' => '124',
'sort_order' => '124',
'stream_id' => '20',
'field_id' => '115',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '115',
'namespace' => 'url_link_type',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '115',
'field_id' => '115',
'locale' => 'en',
'name' => 'anomaly.extension.url_link_type::field.description.name',
'placeholder' => 'anomaly.extension.url_link_type::field.description.placeholder',
'warning' => 'anomaly.extension.url_link_type::field.description.warning',
'instructions' => 'anomaly.extension.url_link_type::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '124',
'assignment_id' => '124',
'locale' => 'en',
'label' => 'anomaly.extension.url_link_type::field.description.label.urls',
'warning' => 'anomaly.extension.url_link_type::field.description.warning.urls',
'placeholder' => 'anomaly.extension.url_link_type::field.description.placeholder.urls',
'instructions' => 'anomaly.extension.url_link_type::field.description.instructions.urls',
],
],
],
],
'translations' => [
[
'id' => '20',
'stream_id' => '20',
'locale' => 'en',
'name' => 'anomaly.extension.url_link_type::stream.urls.name',
'description' => 'anomaly.extension.url_link_type::stream.urls.description',
],
],
];

    
}
