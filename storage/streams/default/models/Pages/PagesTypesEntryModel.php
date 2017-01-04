<?php namespace Anomaly\Streams\Platform\Model\Pages;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PagesTypesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'pages_types';

    protected $titleName = 'name';

    protected $rules = [
'name' => 'required|unique:pages_types,name',
'slug' => 'required|unique:pages_types,slug',
'description' => '',
'theme_layout' => 'required',
'layout' => 'required',
'handler' => 'required',
];

    protected $fields = [
'name',
'slug',
'description',
'theme_layout',
'layout',
'handler',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['name', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Pages\PagesTypesEntryTranslationsModel';

    protected $stream = [
'id' => '10',
'namespace' => 'pages',
'slug' => 'types',
'prefix' => 'pages_',
'title_column' => 'name',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '1',
'searchable' => '0',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '61',
'sort_order' => '61',
'stream_id' => '10',
'field_id' => '57',
'config' => 'a:1:{s:3:"max";i:50;}',
'unique' => '1',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '57',
'namespace' => 'pages',
'slug' => 'name',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '57',
'field_id' => '57',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.name.name',
'placeholder' => 'anomaly.module.pages::field.name.placeholder',
'warning' => 'anomaly.module.pages::field.name.warning',
'instructions' => 'anomaly.module.pages::field.name.instructions',
],
],
],
'translations' => [
[
'id' => '61',
'assignment_id' => '61',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.name.label.types',
'warning' => 'anomaly.module.pages::field.name.warning.types',
'placeholder' => 'anomaly.module.pages::field.name.placeholder.types',
'instructions' => 'anomaly.module.pages::field.name.instructions.types',
],
],
],
[
'id' => '62',
'sort_order' => '62',
'stream_id' => '10',
'field_id' => '40',
'config' => 'a:3:{s:7:"slugify";s:4:"name";s:4:"type";s:1:"_";s:3:"max";i:50;}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '40',
'namespace' => 'pages',
'slug' => 'slug',
'type' => 'anomaly.field_type.slug',
'config' => 'a:2:{s:7:"slugify";s:5:"title";s:4:"type";s:1:"-";}',
'locked' => '1',
'translations' => [
[
'id' => '40',
'field_id' => '40',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.slug.name',
'placeholder' => 'anomaly.module.pages::field.slug.placeholder',
'warning' => 'anomaly.module.pages::field.slug.warning',
'instructions' => 'anomaly.module.pages::field.slug.instructions',
],
],
],
'translations' => [
[
'id' => '62',
'assignment_id' => '62',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.slug.label.types',
'warning' => 'anomaly.module.pages::field.slug.warning.types',
'placeholder' => 'anomaly.module.pages::field.slug.placeholder.types',
'instructions' => 'anomaly.module.pages::field.slug.instructions.types',
],
],
],
[
'id' => '63',
'sort_order' => '63',
'stream_id' => '10',
'field_id' => '58',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '58',
'namespace' => 'pages',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '58',
'field_id' => '58',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.description.name',
'placeholder' => 'anomaly.module.pages::field.description.placeholder',
'warning' => 'anomaly.module.pages::field.description.warning',
'instructions' => 'anomaly.module.pages::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '63',
'assignment_id' => '63',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.description.label.types',
'warning' => 'anomaly.module.pages::field.description.warning.types',
'placeholder' => 'anomaly.module.pages::field.description.placeholder.types',
'instructions' => 'anomaly.module.pages::field.description.instructions.types',
],
],
],
[
'id' => '64',
'sort_order' => '64',
'stream_id' => '10',
'field_id' => '51',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '51',
'namespace' => 'pages',
'slug' => 'theme_layout',
'type' => 'anomaly.field_type.select',
'config' => 'a:2:{s:13:"default_value";s:27:"theme::layouts/default.twig";s:7:"handler";s:46:"Anomaly\SelectFieldType\Handler\Layouts@handle";}',
'locked' => '1',
'translations' => [
[
'id' => '51',
'field_id' => '51',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.theme_layout.name',
'placeholder' => 'anomaly.module.pages::field.theme_layout.placeholder',
'warning' => 'anomaly.module.pages::field.theme_layout.warning',
'instructions' => 'anomaly.module.pages::field.theme_layout.instructions',
],
],
],
'translations' => [
[
'id' => '64',
'assignment_id' => '64',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.theme_layout.label.types',
'warning' => 'anomaly.module.pages::field.theme_layout.warning.types',
'placeholder' => 'anomaly.module.pages::field.theme_layout.placeholder.types',
'instructions' => 'anomaly.module.pages::field.theme_layout.instructions.types',
],
],
],
[
'id' => '65',
'sort_order' => '65',
'stream_id' => '10',
'field_id' => '48',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '48',
'namespace' => 'pages',
'slug' => 'layout',
'type' => 'anomaly.field_type.editor',
'config' => 'a:2:{s:13:"default_value";s:25:"<h1>{{ page.title }}</h1>";s:4:"mode";s:4:"twig";}',
'locked' => '1',
'translations' => [
[
'id' => '48',
'field_id' => '48',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.layout.name',
'placeholder' => 'anomaly.module.pages::field.layout.placeholder',
'warning' => 'anomaly.module.pages::field.layout.warning',
'instructions' => 'anomaly.module.pages::field.layout.instructions',
],
],
],
'translations' => [
[
'id' => '65',
'assignment_id' => '65',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.layout.label.types',
'warning' => 'anomaly.module.pages::field.layout.warning.types',
'placeholder' => 'anomaly.module.pages::field.layout.placeholder.types',
'instructions' => 'anomaly.module.pages::field.layout.instructions.types',
],
],
],
[
'id' => '66',
'sort_order' => '66',
'stream_id' => '10',
'field_id' => '53',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '53',
'namespace' => 'pages',
'slug' => 'handler',
'type' => 'anomaly.field_type.addon',
'config' => 'a:3:{s:4:"type";s:9:"extension";s:6:"search";s:31:"anomaly.module.pages::handler.*";s:13:"default_value";s:38:"anomaly.extension.default_page_handler";}',
'locked' => '1',
'translations' => [
[
'id' => '53',
'field_id' => '53',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.handler.name',
'placeholder' => 'anomaly.module.pages::field.handler.placeholder',
'warning' => 'anomaly.module.pages::field.handler.warning',
'instructions' => 'anomaly.module.pages::field.handler.instructions',
],
],
],
'translations' => [
[
'id' => '66',
'assignment_id' => '66',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.handler.label.types',
'warning' => 'anomaly.module.pages::field.handler.warning.types',
'placeholder' => 'anomaly.module.pages::field.handler.placeholder.types',
'instructions' => 'anomaly.module.pages::field.handler.instructions.types',
],
],
],
],
'translations' => [
[
'id' => '10',
'stream_id' => '10',
'locale' => 'en',
'name' => 'anomaly.module.pages::stream.types.name',
'description' => 'anomaly.module.pages::stream.types.description',
],
],
];

    
}
