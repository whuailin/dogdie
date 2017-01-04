<?php namespace Anomaly\Streams\Platform\Model\Pages;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PagesPagesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = true;

    protected $table = 'pages_pages';

    protected $titleName = 'title';

    protected $rules = [
'str_id' => 'required',
'title' => 'required',
'slug' => 'required',
'path' => 'required',
'type' => 'required',
'entry' => '',
'parent' => '',
'visible' => '',
'enabled' => '',
'exact' => '',
'home' => '',
'meta_title' => '',
'meta_description' => '',
'meta_keywords' => '',
'theme_layout' => '',
'allowed_roles' => '',
];

    protected $fields = [
'str_id',
'title',
'slug',
'path',
'type',
'entry',
'parent',
'visible',
'enabled',
'exact',
'home',
'meta_title',
'meta_description',
'meta_keywords',
'theme_layout',
'allowed_roles',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = ['type', 'entry', 'parent', 'allowed_roles'];

    protected $translatedAttributes = ['title', 'meta_title', 'meta_description', 'meta_keywords'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Pages\PagesPagesEntryTranslationsModel';

    protected $stream = [
'id' => '9',
'namespace' => 'pages',
'slug' => 'pages',
'prefix' => 'pages_',
'title_column' => 'title',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '1',
'searchable' => '1',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '45',
'sort_order' => '45',
'stream_id' => '9',
'field_id' => '38',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '38',
'namespace' => 'pages',
'slug' => 'str_id',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '38',
'field_id' => '38',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.str_id.name',
'placeholder' => 'anomaly.module.pages::field.str_id.placeholder',
'warning' => 'anomaly.module.pages::field.str_id.warning',
'instructions' => 'anomaly.module.pages::field.str_id.instructions',
],
],
],
'translations' => [
[
'id' => '45',
'assignment_id' => '45',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.str_id.label.pages',
'warning' => 'anomaly.module.pages::field.str_id.warning.pages',
'placeholder' => 'anomaly.module.pages::field.str_id.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.str_id.instructions.pages',
],
],
],
[
'id' => '46',
'sort_order' => '46',
'stream_id' => '9',
'field_id' => '39',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '39',
'namespace' => 'pages',
'slug' => 'title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '39',
'field_id' => '39',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.title.name',
'placeholder' => 'anomaly.module.pages::field.title.placeholder',
'warning' => 'anomaly.module.pages::field.title.warning',
'instructions' => 'anomaly.module.pages::field.title.instructions',
],
],
],
'translations' => [
[
'id' => '46',
'assignment_id' => '46',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.title.label.pages',
'warning' => 'anomaly.module.pages::field.title.warning.pages',
'placeholder' => 'anomaly.module.pages::field.title.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.title.instructions.pages',
],
],
],
[
'id' => '47',
'sort_order' => '47',
'stream_id' => '9',
'field_id' => '40',
'config' => 'a:0:{}',
'unique' => '0',
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
'id' => '47',
'assignment_id' => '47',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.slug.label.pages',
'warning' => 'anomaly.module.pages::field.slug.warning.pages',
'placeholder' => 'anomaly.module.pages::field.slug.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.slug.instructions.pages',
],
],
],
[
'id' => '48',
'sort_order' => '48',
'stream_id' => '9',
'field_id' => '42',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '42',
'namespace' => 'pages',
'slug' => 'path',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '42',
'field_id' => '42',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.path.name',
'placeholder' => 'anomaly.module.pages::field.path.placeholder',
'warning' => 'anomaly.module.pages::field.path.warning',
'instructions' => 'anomaly.module.pages::field.path.instructions',
],
],
],
'translations' => [
[
'id' => '48',
'assignment_id' => '48',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.path.label.pages',
'warning' => 'anomaly.module.pages::field.path.warning.pages',
'placeholder' => 'anomaly.module.pages::field.path.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.path.instructions.pages',
],
],
],
[
'id' => '49',
'sort_order' => '49',
'stream_id' => '9',
'field_id' => '52',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '52',
'namespace' => 'pages',
'slug' => 'type',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\PagesModule\Type\TypeModel";}',
'locked' => '1',
'translations' => [
[
'id' => '52',
'field_id' => '52',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.type.name',
'placeholder' => 'anomaly.module.pages::field.type.placeholder',
'warning' => 'anomaly.module.pages::field.type.warning',
'instructions' => 'anomaly.module.pages::field.type.instructions',
],
],
],
'translations' => [
[
'id' => '49',
'assignment_id' => '49',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.type.label.pages',
'warning' => 'anomaly.module.pages::field.type.warning.pages',
'placeholder' => 'anomaly.module.pages::field.type.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.type.instructions.pages',
],
],
],
[
'id' => '50',
'sort_order' => '50',
'stream_id' => '9',
'field_id' => '56',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '56',
'namespace' => 'pages',
'slug' => 'entry',
'type' => 'anomaly.field_type.polymorphic',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '56',
'field_id' => '56',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.entry.name',
'placeholder' => 'anomaly.module.pages::field.entry.placeholder',
'warning' => 'anomaly.module.pages::field.entry.warning',
'instructions' => 'anomaly.module.pages::field.entry.instructions',
],
],
],
'translations' => [
[
'id' => '50',
'assignment_id' => '50',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.entry.label.pages',
'warning' => 'anomaly.module.pages::field.entry.warning.pages',
'placeholder' => 'anomaly.module.pages::field.entry.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.entry.instructions.pages',
],
],
],
[
'id' => '51',
'sort_order' => '51',
'stream_id' => '9',
'field_id' => '50',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '50',
'namespace' => 'pages',
'slug' => 'parent',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\PagesModule\Page\PageModel";}',
'locked' => '1',
'translations' => [
[
'id' => '50',
'field_id' => '50',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.parent.name',
'placeholder' => 'anomaly.module.pages::field.parent.placeholder',
'warning' => 'anomaly.module.pages::field.parent.warning',
'instructions' => 'anomaly.module.pages::field.parent.instructions',
],
],
],
'translations' => [
[
'id' => '51',
'assignment_id' => '51',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.parent.label.pages',
'warning' => 'anomaly.module.pages::field.parent.warning.pages',
'placeholder' => 'anomaly.module.pages::field.parent.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.parent.instructions.pages',
],
],
],
[
'id' => '52',
'sort_order' => '52',
'stream_id' => '9',
'field_id' => '54',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '54',
'namespace' => 'pages',
'slug' => 'visible',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:1:{s:13:"default_value";b:1;}',
'locked' => '1',
'translations' => [
[
'id' => '54',
'field_id' => '54',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.visible.name',
'placeholder' => 'anomaly.module.pages::field.visible.placeholder',
'warning' => 'anomaly.module.pages::field.visible.warning',
'instructions' => 'anomaly.module.pages::field.visible.instructions',
],
],
],
'translations' => [
[
'id' => '52',
'assignment_id' => '52',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.visible.label.pages',
'warning' => 'anomaly.module.pages::field.visible.warning.pages',
'placeholder' => 'anomaly.module.pages::field.visible.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.visible.instructions.pages',
],
],
],
[
'id' => '53',
'sort_order' => '53',
'stream_id' => '9',
'field_id' => '43',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '43',
'namespace' => 'pages',
'slug' => 'enabled',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:1:{s:13:"default_value";b:1;}',
'locked' => '1',
'translations' => [
[
'id' => '43',
'field_id' => '43',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.enabled.name',
'placeholder' => 'anomaly.module.pages::field.enabled.placeholder',
'warning' => 'anomaly.module.pages::field.enabled.warning',
'instructions' => 'anomaly.module.pages::field.enabled.instructions',
],
],
],
'translations' => [
[
'id' => '53',
'assignment_id' => '53',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.enabled.label.pages',
'warning' => 'anomaly.module.pages::field.enabled.warning.pages',
'placeholder' => 'anomaly.module.pages::field.enabled.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.enabled.instructions.pages',
],
],
],
[
'id' => '54',
'sort_order' => '54',
'stream_id' => '9',
'field_id' => '55',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '55',
'namespace' => 'pages',
'slug' => 'exact',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:1:{s:13:"default_value";b:1;}',
'locked' => '1',
'translations' => [
[
'id' => '55',
'field_id' => '55',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.exact.name',
'placeholder' => 'anomaly.module.pages::field.exact.placeholder',
'warning' => 'anomaly.module.pages::field.exact.warning',
'instructions' => 'anomaly.module.pages::field.exact.instructions',
],
],
],
'translations' => [
[
'id' => '54',
'assignment_id' => '54',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.exact.label.pages',
'warning' => 'anomaly.module.pages::field.exact.warning.pages',
'placeholder' => 'anomaly.module.pages::field.exact.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.exact.instructions.pages',
],
],
],
[
'id' => '55',
'sort_order' => '55',
'stream_id' => '9',
'field_id' => '44',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '44',
'namespace' => 'pages',
'slug' => 'home',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:1:{s:13:"default_value";b:0;}',
'locked' => '1',
'translations' => [
[
'id' => '44',
'field_id' => '44',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.home.name',
'placeholder' => 'anomaly.module.pages::field.home.placeholder',
'warning' => 'anomaly.module.pages::field.home.warning',
'instructions' => 'anomaly.module.pages::field.home.instructions',
],
],
],
'translations' => [
[
'id' => '55',
'assignment_id' => '55',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.home.label.pages',
'warning' => 'anomaly.module.pages::field.home.warning.pages',
'placeholder' => 'anomaly.module.pages::field.home.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.home.instructions.pages',
],
],
],
[
'id' => '56',
'sort_order' => '56',
'stream_id' => '9',
'field_id' => '45',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '45',
'namespace' => 'pages',
'slug' => 'meta_title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '45',
'field_id' => '45',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.meta_title.name',
'placeholder' => 'anomaly.module.pages::field.meta_title.placeholder',
'warning' => 'anomaly.module.pages::field.meta_title.warning',
'instructions' => 'anomaly.module.pages::field.meta_title.instructions',
],
],
],
'translations' => [
[
'id' => '56',
'assignment_id' => '56',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.meta_title.label.pages',
'warning' => 'anomaly.module.pages::field.meta_title.warning.pages',
'placeholder' => 'anomaly.module.pages::field.meta_title.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.meta_title.instructions.pages',
],
],
],
[
'id' => '57',
'sort_order' => '57',
'stream_id' => '9',
'field_id' => '46',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '46',
'namespace' => 'pages',
'slug' => 'meta_description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '46',
'field_id' => '46',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.meta_description.name',
'placeholder' => 'anomaly.module.pages::field.meta_description.placeholder',
'warning' => 'anomaly.module.pages::field.meta_description.warning',
'instructions' => 'anomaly.module.pages::field.meta_description.instructions',
],
],
],
'translations' => [
[
'id' => '57',
'assignment_id' => '57',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.meta_description.label.pages',
'warning' => 'anomaly.module.pages::field.meta_description.warning.pages',
'placeholder' => 'anomaly.module.pages::field.meta_description.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.meta_description.instructions.pages',
],
],
],
[
'id' => '58',
'sort_order' => '58',
'stream_id' => '9',
'field_id' => '47',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '47',
'namespace' => 'pages',
'slug' => 'meta_keywords',
'type' => 'anomaly.field_type.tags',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '47',
'field_id' => '47',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.meta_keywords.name',
'placeholder' => 'anomaly.module.pages::field.meta_keywords.placeholder',
'warning' => 'anomaly.module.pages::field.meta_keywords.warning',
'instructions' => 'anomaly.module.pages::field.meta_keywords.instructions',
],
],
],
'translations' => [
[
'id' => '58',
'assignment_id' => '58',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.meta_keywords.label.pages',
'warning' => 'anomaly.module.pages::field.meta_keywords.warning.pages',
'placeholder' => 'anomaly.module.pages::field.meta_keywords.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.meta_keywords.instructions.pages',
],
],
],
[
'id' => '59',
'sort_order' => '59',
'stream_id' => '9',
'field_id' => '51',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
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
'id' => '59',
'assignment_id' => '59',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.theme_layout.label.pages',
'warning' => 'anomaly.module.pages::field.theme_layout.warning.pages',
'placeholder' => 'anomaly.module.pages::field.theme_layout.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.theme_layout.instructions.pages',
],
],
],
[
'id' => '60',
'sort_order' => '60',
'stream_id' => '9',
'field_id' => '49',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '49',
'namespace' => 'pages',
'slug' => 'allowed_roles',
'type' => 'anomaly.field_type.multiple',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\UsersModule\Role\RoleModel";}',
'locked' => '1',
'translations' => [
[
'id' => '49',
'field_id' => '49',
'locale' => 'en',
'name' => 'anomaly.module.pages::field.allowed_roles.name',
'placeholder' => 'anomaly.module.pages::field.allowed_roles.placeholder',
'warning' => 'anomaly.module.pages::field.allowed_roles.warning',
'instructions' => 'anomaly.module.pages::field.allowed_roles.instructions',
],
],
],
'translations' => [
[
'id' => '60',
'assignment_id' => '60',
'locale' => 'en',
'label' => 'anomaly.module.pages::field.allowed_roles.label.pages',
'warning' => 'anomaly.module.pages::field.allowed_roles.warning.pages',
'placeholder' => 'anomaly.module.pages::field.allowed_roles.placeholder.pages',
'instructions' => 'anomaly.module.pages::field.allowed_roles.instructions.pages',
],
],
],
],
'translations' => [
[
'id' => '9',
'stream_id' => '9',
'locale' => 'en',
'name' => 'anomaly.module.pages::stream.pages.name',
'description' => 'anomaly.module.pages::stream.pages.description',
],
],
];

    
public function type()
{

return $this->getFieldType('type')->getRelation();
}

public function entry()
{

return $this->getFieldType('entry')->getRelation();
}

public function parent()
{

return $this->getFieldType('parent')->getRelation();
}

public function allowedRoles()
{

return $this->getFieldType('allowed_roles')->getRelation();
}

}
