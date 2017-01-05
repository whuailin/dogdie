<?php namespace Anomaly\Streams\Platform\Model\Posts;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PostsPostsEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = true;

    protected $table = 'posts_posts';

    protected $titleName = 'title';

    protected $rules = [
'str_id' => 'required|unique:posts_posts,str_id',
'title' => 'required',
'summary' => '',
'slug' => 'required|unique:posts_posts,slug',
'type' => 'required',
'publish_at' => 'required',
'author' => 'required',
'entry' => 'required',
'meta_title' => '',
'meta_description' => '',
'meta_keywords' => '',
'category' => '',
'featured' => '',
'enabled' => '',
'tags' => '',
];

    protected $fields = [
'str_id',
'title',
'summary',
'slug',
'type',
'publish_at',
'author',
'entry',
'meta_title',
'meta_description',
'meta_keywords',
'category',
'featured',
'enabled',
'tags',
];

    protected $dates = ['created_at', 'updated_at', 'publish_at', 'deleted_at'];

    protected $relationships = ['type', 'author', 'entry', 'category'];

    protected $translatedAttributes = ['title', 'summary', 'meta_title', 'meta_description', 'meta_keywords'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryTranslationsModel';

    protected $stream = [
'id' => '12',
'namespace' => 'posts',
'slug' => 'posts',
'prefix' => 'posts_',
'title_column' => 'title',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '0',
'searchable' => '1',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '70',
'sort_order' => '70',
'stream_id' => '12',
'field_id' => '59',
'config' => 'a:0:{}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '59',
'namespace' => 'posts',
'slug' => 'str_id',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '59',
'field_id' => '59',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.str_id.name',
'placeholder' => 'anomaly.module.posts::field.str_id.placeholder',
'warning' => 'anomaly.module.posts::field.str_id.warning',
'instructions' => 'anomaly.module.posts::field.str_id.instructions',
],
],
],
'translations' => [
[
'id' => '70',
'assignment_id' => '70',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.str_id.label.posts',
'warning' => 'anomaly.module.posts::field.str_id.warning.posts',
'placeholder' => 'anomaly.module.posts::field.str_id.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.str_id.instructions.posts',
],
],
],
[
'id' => '71',
'sort_order' => '71',
'stream_id' => '12',
'field_id' => '61',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '61',
'namespace' => 'posts',
'slug' => 'title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '61',
'field_id' => '61',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.title.name',
'placeholder' => 'anomaly.module.posts::field.title.placeholder',
'warning' => 'anomaly.module.posts::field.title.warning',
'instructions' => 'anomaly.module.posts::field.title.instructions',
],
],
],
'translations' => [
[
'id' => '71',
'assignment_id' => '71',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.title.label.posts',
'warning' => 'anomaly.module.posts::field.title.warning.posts',
'placeholder' => 'anomaly.module.posts::field.title.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.title.instructions.posts',
],
],
],
[
'id' => '72',
'sort_order' => '72',
'stream_id' => '12',
'field_id' => '66',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '66',
'namespace' => 'posts',
'slug' => 'summary',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '66',
'field_id' => '66',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.summary.name',
'placeholder' => 'anomaly.module.posts::field.summary.placeholder',
'warning' => 'anomaly.module.posts::field.summary.warning',
'instructions' => 'anomaly.module.posts::field.summary.instructions',
],
],
],
'translations' => [
[
'id' => '72',
'assignment_id' => '72',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.summary.label.posts',
'warning' => 'anomaly.module.posts::field.summary.warning.posts',
'placeholder' => 'anomaly.module.posts::field.summary.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.summary.instructions.posts',
],
],
],
[
'id' => '73',
'sort_order' => '73',
'stream_id' => '12',
'field_id' => '62',
'config' => 'a:0:{}',
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
'id' => '73',
'assignment_id' => '73',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.slug.label.posts',
'warning' => 'anomaly.module.posts::field.slug.warning.posts',
'placeholder' => 'anomaly.module.posts::field.slug.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.slug.instructions.posts',
],
],
],
[
'id' => '74',
'sort_order' => '74',
'stream_id' => '12',
'field_id' => '64',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '64',
'namespace' => 'posts',
'slug' => 'type',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\PostsModule\Type\TypeModel";}',
'locked' => '1',
'translations' => [
[
'id' => '64',
'field_id' => '64',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.type.name',
'placeholder' => 'anomaly.module.posts::field.type.placeholder',
'warning' => 'anomaly.module.posts::field.type.warning',
'instructions' => 'anomaly.module.posts::field.type.instructions',
],
],
],
'translations' => [
[
'id' => '74',
'assignment_id' => '74',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.type.label.posts',
'warning' => 'anomaly.module.posts::field.type.warning.posts',
'placeholder' => 'anomaly.module.posts::field.type.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.type.instructions.posts',
],
],
],
[
'id' => '75',
'sort_order' => '75',
'stream_id' => '12',
'field_id' => '68',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '68',
'namespace' => 'posts',
'slug' => 'publish_at',
'type' => 'anomaly.field_type.datetime',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '68',
'field_id' => '68',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.publish_at.name',
'placeholder' => 'anomaly.module.posts::field.publish_at.placeholder',
'warning' => 'anomaly.module.posts::field.publish_at.warning',
'instructions' => 'anomaly.module.posts::field.publish_at.instructions',
],
],
],
'translations' => [
[
'id' => '75',
'assignment_id' => '75',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.publish_at.label.posts',
'warning' => 'anomaly.module.posts::field.publish_at.warning.posts',
'placeholder' => 'anomaly.module.posts::field.publish_at.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.publish_at.instructions.posts',
],
],
],
[
'id' => '76',
'sort_order' => '76',
'stream_id' => '12',
'field_id' => '70',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '70',
'namespace' => 'posts',
'slug' => 'author',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:2:{s:4:"mode";s:6:"lookup";s:7:"related";s:34:"Anomaly\UsersModule\User\UserModel";}',
'locked' => '1',
'translations' => [
[
'id' => '70',
'field_id' => '70',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.author.name',
'placeholder' => 'anomaly.module.posts::field.author.placeholder',
'warning' => 'anomaly.module.posts::field.author.warning',
'instructions' => 'anomaly.module.posts::field.author.instructions',
],
],
],
'translations' => [
[
'id' => '76',
'assignment_id' => '76',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.author.label.posts',
'warning' => 'anomaly.module.posts::field.author.warning.posts',
'placeholder' => 'anomaly.module.posts::field.author.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.author.instructions.posts',
],
],
],
[
'id' => '77',
'sort_order' => '77',
'stream_id' => '12',
'field_id' => '69',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '69',
'namespace' => 'posts',
'slug' => 'entry',
'type' => 'anomaly.field_type.polymorphic',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '69',
'field_id' => '69',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.entry.name',
'placeholder' => 'anomaly.module.posts::field.entry.placeholder',
'warning' => 'anomaly.module.posts::field.entry.warning',
'instructions' => 'anomaly.module.posts::field.entry.instructions',
],
],
],
'translations' => [
[
'id' => '77',
'assignment_id' => '77',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.entry.label.posts',
'warning' => 'anomaly.module.posts::field.entry.warning.posts',
'placeholder' => 'anomaly.module.posts::field.entry.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.entry.instructions.posts',
],
],
],
[
'id' => '78',
'sort_order' => '78',
'stream_id' => '12',
'field_id' => '75',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '75',
'namespace' => 'posts',
'slug' => 'meta_title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '75',
'field_id' => '75',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.meta_title.name',
'placeholder' => 'anomaly.module.posts::field.meta_title.placeholder',
'warning' => 'anomaly.module.posts::field.meta_title.warning',
'instructions' => 'anomaly.module.posts::field.meta_title.instructions',
],
],
],
'translations' => [
[
'id' => '78',
'assignment_id' => '78',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.meta_title.label.posts',
'warning' => 'anomaly.module.posts::field.meta_title.warning.posts',
'placeholder' => 'anomaly.module.posts::field.meta_title.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.meta_title.instructions.posts',
],
],
],
[
'id' => '79',
'sort_order' => '79',
'stream_id' => '12',
'field_id' => '76',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '76',
'namespace' => 'posts',
'slug' => 'meta_description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '76',
'field_id' => '76',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.meta_description.name',
'placeholder' => 'anomaly.module.posts::field.meta_description.placeholder',
'warning' => 'anomaly.module.posts::field.meta_description.warning',
'instructions' => 'anomaly.module.posts::field.meta_description.instructions',
],
],
],
'translations' => [
[
'id' => '79',
'assignment_id' => '79',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.meta_description.label.posts',
'warning' => 'anomaly.module.posts::field.meta_description.warning.posts',
'placeholder' => 'anomaly.module.posts::field.meta_description.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.meta_description.instructions.posts',
],
],
],
[
'id' => '80',
'sort_order' => '80',
'stream_id' => '12',
'field_id' => '77',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '77',
'namespace' => 'posts',
'slug' => 'meta_keywords',
'type' => 'anomaly.field_type.tags',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '77',
'field_id' => '77',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.meta_keywords.name',
'placeholder' => 'anomaly.module.posts::field.meta_keywords.placeholder',
'warning' => 'anomaly.module.posts::field.meta_keywords.warning',
'instructions' => 'anomaly.module.posts::field.meta_keywords.instructions',
],
],
],
'translations' => [
[
'id' => '80',
'assignment_id' => '80',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.meta_keywords.label.posts',
'warning' => 'anomaly.module.posts::field.meta_keywords.warning.posts',
'placeholder' => 'anomaly.module.posts::field.meta_keywords.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.meta_keywords.instructions.posts',
],
],
],
[
'id' => '81',
'sort_order' => '81',
'stream_id' => '12',
'field_id' => '72',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '72',
'namespace' => 'posts',
'slug' => 'category',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:42:"Anomaly\PostsModule\Category\CategoryModel";}',
'locked' => '1',
'translations' => [
[
'id' => '72',
'field_id' => '72',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.category.name',
'placeholder' => 'anomaly.module.posts::field.category.placeholder',
'warning' => 'anomaly.module.posts::field.category.warning',
'instructions' => 'anomaly.module.posts::field.category.instructions',
],
],
],
'translations' => [
[
'id' => '81',
'assignment_id' => '81',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.category.label.posts',
'warning' => 'anomaly.module.posts::field.category.warning.posts',
'placeholder' => 'anomaly.module.posts::field.category.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.category.instructions.posts',
],
],
],
[
'id' => '82',
'sort_order' => '82',
'stream_id' => '12',
'field_id' => '74',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '74',
'namespace' => 'posts',
'slug' => 'featured',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:1:{s:13:"default_value";b:0;}',
'locked' => '1',
'translations' => [
[
'id' => '74',
'field_id' => '74',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.featured.name',
'placeholder' => 'anomaly.module.posts::field.featured.placeholder',
'warning' => 'anomaly.module.posts::field.featured.warning',
'instructions' => 'anomaly.module.posts::field.featured.instructions',
],
],
],
'translations' => [
[
'id' => '82',
'assignment_id' => '82',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.featured.label.posts',
'warning' => 'anomaly.module.posts::field.featured.warning.posts',
'placeholder' => 'anomaly.module.posts::field.featured.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.featured.instructions.posts',
],
],
],
[
'id' => '83',
'sort_order' => '83',
'stream_id' => '12',
'field_id' => '73',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '73',
'namespace' => 'posts',
'slug' => 'enabled',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:1:{s:13:"default_value";b:0;}',
'locked' => '1',
'translations' => [
[
'id' => '73',
'field_id' => '73',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.enabled.name',
'placeholder' => 'anomaly.module.posts::field.enabled.placeholder',
'warning' => 'anomaly.module.posts::field.enabled.warning',
'instructions' => 'anomaly.module.posts::field.enabled.instructions',
],
],
],
'translations' => [
[
'id' => '83',
'assignment_id' => '83',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.enabled.label.posts',
'warning' => 'anomaly.module.posts::field.enabled.warning.posts',
'placeholder' => 'anomaly.module.posts::field.enabled.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.enabled.instructions.posts',
],
],
],
[
'id' => '84',
'sort_order' => '84',
'stream_id' => '12',
'field_id' => '65',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '65',
'namespace' => 'posts',
'slug' => 'tags',
'type' => 'anomaly.field_type.tags',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '65',
'field_id' => '65',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.tags.name',
'placeholder' => 'anomaly.module.posts::field.tags.placeholder',
'warning' => 'anomaly.module.posts::field.tags.warning',
'instructions' => 'anomaly.module.posts::field.tags.instructions',
],
],
],
'translations' => [
[
'id' => '84',
'assignment_id' => '84',
'locale' => 'en',
'label' => 'anomaly.module.posts::field.tags.label.posts',
'warning' => 'anomaly.module.posts::field.tags.warning.posts',
'placeholder' => 'anomaly.module.posts::field.tags.placeholder.posts',
'instructions' => 'anomaly.module.posts::field.tags.instructions.posts',
],
],
],
],
'translations' => [
[
'id' => '12',
'stream_id' => '12',
'locale' => 'en',
'name' => 'anomaly.module.posts::stream.posts.name',
'description' => 'anomaly.module.posts::stream.posts.description',
],
],
];

    
public function type()
{

return $this->getFieldType('type')->getRelation();
}

public function author()
{

return $this->getFieldType('author')->getRelation();
}

public function entry()
{

return $this->getFieldType('entry')->getRelation();
}

public function category()
{

return $this->getFieldType('category')->getRelation();
}

}
