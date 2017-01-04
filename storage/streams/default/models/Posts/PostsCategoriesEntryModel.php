<?php namespace Anomaly\Streams\Platform\Model\Posts;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PostsCategoriesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'posts_categories';

    protected $titleName = 'name';

    protected $rules = [
'name' => 'required|unique:posts_categories,name',
'slug' => 'required|unique:posts_categories,slug',
'description' => '',
];

    protected $fields = [
'name',
'slug',
'description',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['name', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryTranslationsModel';

    protected $stream = [
'id' => '11',
'namespace' => 'posts',
'slug' => 'categories',
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
'id' => '67',
'sort_order' => '67',
'stream_id' => '11',
'field_id' => '60',
'config' => 'a:0:{}',
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
'id' => '67',
'assignment_id' => '67',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.name.label.categories',
'warning' => 'anomaly.module.posts::field.name.warning.categories',
'placeholder' => 'anomaly.module.posts::field.name.placeholder.categories',
'instructions' => 'anomaly.module.posts::field.name.instructions.categories',
],
],
],
[
'id' => '68',
'sort_order' => '68',
'stream_id' => '11',
'field_id' => '62',
'config' => 'a:1:{s:7:"slugify";s:4:"name";}',
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
'id' => '68',
'assignment_id' => '68',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.slug.label.categories',
'warning' => 'anomaly.module.posts::field.slug.warning.categories',
'placeholder' => 'anomaly.module.posts::field.slug.placeholder.categories',
'instructions' => 'anomaly.module.posts::field.slug.instructions.categories',
],
],
],
[
'id' => '69',
'sort_order' => '69',
'stream_id' => '11',
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
'id' => '69',
'assignment_id' => '69',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.description.label.categories',
'warning' => 'anomaly.module.posts::field.description.warning.categories',
'placeholder' => 'anomaly.module.posts::field.description.placeholder.categories',
'instructions' => 'anomaly.module.posts::field.description.instructions.categories',
],
],
],
],
'translations' => [
[
'id' => '11',
'stream_id' => '11',
'locale' => 'en',
'name' => 'anomaly.module.posts::stream.categories.name',
'description' => 'anomaly.module.posts::stream.categories.description',
],
],
];

    
}
