<?php namespace Anomaly\Streams\Platform\Model\Posts;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PostsTypesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'posts_types';

    protected $titleName = 'name';

    protected $rules = [
'name' => 'required|unique:posts_types,name',
'slug' => 'required|unique:posts_types,slug',
'layout' => 'required',
'theme_layout' => 'required',
'description' => '',
];

    protected $fields = [
'name',
'slug',
'layout',
'theme_layout',
'description',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['name', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Posts\PostsTypesEntryTranslationsModel';

    protected $stream = [
'id' => '13',
'namespace' => 'posts',
'slug' => 'types',
'prefix' => 'posts_',
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
'id' => '85',
'sort_order' => '85',
'stream_id' => '13',
'field_id' => '60',
'config' => 'a:1:{s:3:"max";i:50;}',
'unique' => '1',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '60',
'namespace' => 'posts',
'slug' => 'name',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '60',
'field_id' => '60',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.name.name',
'placeholder' => 'anomaly.module.posts::field.name.placeholder',
'warning' => 'anomaly.module.posts::field.name.warning',
'instructions' => 'anomaly.module.posts::field.name.instructions',
],
],
],
'translations' => [
[
'id' => '85',
'assignment_id' => '85',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.name.label.types',
'warning' => 'anomaly.module.posts::field.name.warning.types',
'placeholder' => 'anomaly.module.posts::field.name.placeholder.types',
'instructions' => 'anomaly.module.posts::field.name.instructions.types',
],
],
],
[
'id' => '86',
'sort_order' => '86',
'stream_id' => '13',
'field_id' => '62',
'config' => 'a:3:{s:7:"slugify";s:4:"name";s:4:"type";s:1:"_";s:3:"max";i:50;}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '62',
'namespace' => 'posts',
'slug' => 'slug',
'type' => 'anomaly.field_type.slug',
'config' => 'a:2:{s:7:"slugify";s:5:"title";s:4:"type";s:1:"-";}',
'locked' => '1',
'translations' => [
[
'id' => '62',
'field_id' => '62',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.slug.name',
'placeholder' => 'anomaly.module.posts::field.slug.placeholder',
'warning' => 'anomaly.module.posts::field.slug.warning',
'instructions' => 'anomaly.module.posts::field.slug.instructions',
],
],
],
'translations' => [
[
'id' => '86',
'assignment_id' => '86',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.slug.label.types',
'warning' => 'anomaly.module.posts::field.slug.warning.types',
'placeholder' => 'anomaly.module.posts::field.slug.placeholder.types',
'instructions' => 'anomaly.module.posts::field.slug.instructions.types',
],
],
],
[
'id' => '87',
'sort_order' => '87',
'stream_id' => '13',
'field_id' => '71',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '71',
'namespace' => 'posts',
'slug' => 'layout',
'type' => 'anomaly.field_type.editor',
'config' => 'a:2:{s:13:"default_value";s:22:"{{ post.content|raw }}";s:4:"mode";s:4:"twig";}',
'locked' => '1',
'translations' => [
[
'id' => '71',
'field_id' => '71',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.layout.name',
'placeholder' => 'anomaly.module.posts::field.layout.placeholder',
'warning' => 'anomaly.module.posts::field.layout.warning',
'instructions' => 'anomaly.module.posts::field.layout.instructions',
],
],
],
'translations' => [
[
'id' => '87',
'assignment_id' => '87',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.layout.label.types',
'warning' => 'anomaly.module.posts::field.layout.warning.types',
'placeholder' => 'anomaly.module.posts::field.layout.placeholder.types',
'instructions' => 'anomaly.module.posts::field.layout.instructions.types',
],
],
],
[
'id' => '88',
'sort_order' => '88',
'stream_id' => '13',
'field_id' => '79',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '79',
'namespace' => 'posts',
'slug' => 'theme_layout',
'type' => 'anomaly.field_type.select',
'config' => 'a:1:{s:7:"handler";s:39:"Anomaly\SelectFieldType\Handler\Layouts";}',
'locked' => '1',
'translations' => [
[
'id' => '79',
'field_id' => '79',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.theme_layout.name',
'placeholder' => 'anomaly.module.posts::field.theme_layout.placeholder',
'warning' => 'anomaly.module.posts::field.theme_layout.warning',
'instructions' => 'anomaly.module.posts::field.theme_layout.instructions',
],
],
],
'translations' => [
[
'id' => '88',
'assignment_id' => '88',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.theme_layout.label.types',
'warning' => 'anomaly.module.posts::field.theme_layout.warning.types',
'placeholder' => 'anomaly.module.posts::field.theme_layout.placeholder.types',
'instructions' => 'anomaly.module.posts::field.theme_layout.instructions.types',
],
],
],
[
'id' => '89',
'sort_order' => '89',
'stream_id' => '13',
'field_id' => '67',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '67',
'namespace' => 'posts',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '67',
'field_id' => '67',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.description.name',
'placeholder' => 'anomaly.module.posts::field.description.placeholder',
'warning' => 'anomaly.module.posts::field.description.warning',
'instructions' => 'anomaly.module.posts::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '89',
'assignment_id' => '89',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.description.label.types',
'warning' => 'anomaly.module.posts::field.description.warning.types',
'placeholder' => 'anomaly.module.posts::field.description.placeholder.types',
'instructions' => 'anomaly.module.posts::field.description.instructions.types',
],
],
],
],
'translations' => [
[
'id' => '13',
'stream_id' => '13',
'locale' => 'en',
'name' => 'anomaly.module.posts::stream.types.name',
'description' => 'anomaly.module.posts::stream.types.description',
],
],
];

    
}
