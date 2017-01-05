<?php namespace Anomaly\Streams\Platform\Model\Users;

use Anomaly\Streams\Platform\Entry\EntryModel;

class UsersRolesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'users_roles';

    protected $titleName = 'name';

    protected $rules = [
'name' => 'required',
'slug' => 'required|unique:users_roles,slug',
'description' => '',
'permissions' => '',
];

    protected $fields = [
'name',
'slug',
'description',
'permissions',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['name', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Users\UsersRolesEntryTranslationsModel';

    protected $stream = [
'id' => '18',
'namespace' => 'users',
'slug' => 'roles',
'prefix' => 'users_',
'title_column' => 'name',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '0',
'searchable' => '0',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '115',
'sort_order' => '115',
'stream_id' => '18',
'field_id' => '100',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '100',
'namespace' => 'users',
'slug' => 'name',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '100',
'field_id' => '100',
'locale' => 'en',
'name' => 'anomaly.module.users::field.name.name',
'placeholder' => 'anomaly.module.users::field.name.placeholder',
'warning' => 'anomaly.module.users::field.name.warning',
'instructions' => 'anomaly.module.users::field.name.instructions',
],
],
],
'translations' => [
[
'id' => '115',
'assignment_id' => '115',
'locale' => 'en',
'label' => 'anomaly.module.users::field.name.label.roles',
'warning' => 'anomaly.module.users::field.name.warning.roles',
'placeholder' => 'anomaly.module.users::field.name.placeholder.roles',
'instructions' => 'anomaly.module.users::field.name.instructions.roles',
],
],
],
[
'id' => '116',
'sort_order' => '116',
'stream_id' => '18',
'field_id' => '108',
'config' => 'a:0:{}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '108',
'namespace' => 'users',
'slug' => 'slug',
'type' => 'anomaly.field_type.slug',
'config' => 'a:1:{s:7:"slugify";s:4:"name";}',
'locked' => '1',
'translations' => [
[
'id' => '108',
'field_id' => '108',
'locale' => 'en',
'name' => 'anomaly.module.users::field.slug.name',
'placeholder' => 'anomaly.module.users::field.slug.placeholder',
'warning' => 'anomaly.module.users::field.slug.warning',
'instructions' => 'anomaly.module.users::field.slug.instructions',
],
],
],
'translations' => [
[
'id' => '116',
'assignment_id' => '116',
'locale' => 'en',
'label' => 'anomaly.module.users::field.slug.label.roles',
'warning' => 'anomaly.module.users::field.slug.warning.roles',
'placeholder' => 'anomaly.module.users::field.slug.placeholder.roles',
'instructions' => 'anomaly.module.users::field.slug.instructions.roles',
],
],
],
[
'id' => '117',
'sort_order' => '117',
'stream_id' => '18',
'field_id' => '101',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '101',
'namespace' => 'users',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '101',
'field_id' => '101',
'locale' => 'en',
'name' => 'anomaly.module.users::field.description.name',
'placeholder' => 'anomaly.module.users::field.description.placeholder',
'warning' => 'anomaly.module.users::field.description.warning',
'instructions' => 'anomaly.module.users::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '117',
'assignment_id' => '117',
'locale' => 'en',
'label' => 'anomaly.module.users::field.description.label.roles',
'warning' => 'anomaly.module.users::field.description.warning.roles',
'placeholder' => 'anomaly.module.users::field.description.placeholder.roles',
'instructions' => 'anomaly.module.users::field.description.instructions.roles',
],
],
],
[
'id' => '118',
'sort_order' => '118',
'stream_id' => '18',
'field_id' => '96',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '96',
'namespace' => 'users',
'slug' => 'permissions',
'type' => 'anomaly.field_type.checkboxes',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '96',
'field_id' => '96',
'locale' => 'en',
'name' => 'anomaly.module.users::field.permissions.name',
'placeholder' => 'anomaly.module.users::field.permissions.placeholder',
'warning' => 'anomaly.module.users::field.permissions.warning',
'instructions' => 'anomaly.module.users::field.permissions.instructions',
],
],
],
'translations' => [
[
'id' => '118',
'assignment_id' => '118',
'locale' => 'en',
'label' => 'anomaly.module.users::field.permissions.label.roles',
'warning' => 'anomaly.module.users::field.permissions.warning.roles',
'placeholder' => 'anomaly.module.users::field.permissions.placeholder.roles',
'instructions' => 'anomaly.module.users::field.permissions.instructions.roles',
],
],
],
],
'translations' => [
[
'id' => '18',
'stream_id' => '18',
'locale' => 'en',
'name' => 'anomaly.module.users::stream.roles.name',
'description' => 'anomaly.module.users::stream.roles.description',
],
],
];

    
}
