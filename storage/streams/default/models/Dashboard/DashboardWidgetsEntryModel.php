<?php namespace Anomaly\Streams\Platform\Model\Dashboard;

use Anomaly\Streams\Platform\Entry\EntryModel;

class DashboardWidgetsEntryModel extends EntryModel
{

    

    protected $searchable = false;

    protected $table = 'dashboard_widgets';

    protected $titleName = 'title';

    protected $rules = [
'title' => 'required',
'description' => '',
'extension' => 'required',
'column' => 'required',
'dashboard' => 'required',
'allowed_roles' => '',
'pinned' => '',
];

    protected $fields = [
'title',
'description',
'extension',
'column',
'dashboard',
'allowed_roles',
'pinned',
];

    protected $dates = ['created_at', 'updated_at'];

    protected $relationships = ['dashboard', 'allowed_roles'];

    protected $translatedAttributes = ['title', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Dashboard\DashboardWidgetsEntryTranslationsModel';

    protected $stream = [
'id' => '3',
'namespace' => 'dashboard',
'slug' => 'widgets',
'prefix' => 'dashboard_',
'title_column' => 'title',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '1',
'searchable' => '0',
'trashable' => '0',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '9',
'sort_order' => '9',
'stream_id' => '3',
'field_id' => '8',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '8',
'namespace' => 'dashboard',
'slug' => 'title',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '8',
'field_id' => '8',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.title.name',
'placeholder' => 'anomaly.module.dashboard::field.title.placeholder',
'warning' => 'anomaly.module.dashboard::field.title.warning',
'instructions' => 'anomaly.module.dashboard::field.title.instructions',
],
],
],
'translations' => [
[
'id' => '9',
'assignment_id' => '9',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.title.label.widgets',
'warning' => 'anomaly.module.dashboard::field.title.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.title.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.title.instructions.widgets',
],
],
],
[
'id' => '10',
'sort_order' => '10',
'stream_id' => '3',
'field_id' => '6',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '6',
'namespace' => 'dashboard',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '6',
'field_id' => '6',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.description.name',
'placeholder' => 'anomaly.module.dashboard::field.description.placeholder',
'warning' => 'anomaly.module.dashboard::field.description.warning',
'instructions' => 'anomaly.module.dashboard::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '10',
'assignment_id' => '10',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.description.label.widgets',
'warning' => 'anomaly.module.dashboard::field.description.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.description.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.description.instructions.widgets',
],
],
],
[
'id' => '11',
'sort_order' => '11',
'stream_id' => '3',
'field_id' => '9',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '9',
'namespace' => 'dashboard',
'slug' => 'extension',
'type' => 'anomaly.field_type.addon',
'config' => 'a:2:{s:4:"type";s:9:"extension";s:6:"search";s:34:"anomaly.module.dashboard::widget.*";}',
'locked' => '1',
'translations' => [
[
'id' => '9',
'field_id' => '9',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.extension.name',
'placeholder' => 'anomaly.module.dashboard::field.extension.placeholder',
'warning' => 'anomaly.module.dashboard::field.extension.warning',
'instructions' => 'anomaly.module.dashboard::field.extension.instructions',
],
],
],
'translations' => [
[
'id' => '11',
'assignment_id' => '11',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.extension.label.widgets',
'warning' => 'anomaly.module.dashboard::field.extension.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.extension.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.extension.instructions.widgets',
],
],
],
[
'id' => '12',
'sort_order' => '12',
'stream_id' => '3',
'field_id' => '10',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '10',
'namespace' => 'dashboard',
'slug' => 'column',
'type' => 'anomaly.field_type.integer',
'config' => 'a:2:{s:3:"min";i:1;s:13:"default_value";i:1;}',
'locked' => '1',
'translations' => [
[
'id' => '10',
'field_id' => '10',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.column.name',
'placeholder' => 'anomaly.module.dashboard::field.column.placeholder',
'warning' => 'anomaly.module.dashboard::field.column.warning',
'instructions' => 'anomaly.module.dashboard::field.column.instructions',
],
],
],
'translations' => [
[
'id' => '12',
'assignment_id' => '12',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.column.label.widgets',
'warning' => 'anomaly.module.dashboard::field.column.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.column.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.column.instructions.widgets',
],
],
],
[
'id' => '13',
'sort_order' => '13',
'stream_id' => '3',
'field_id' => '12',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '12',
'namespace' => 'dashboard',
'slug' => 'dashboard',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:48:"Anomaly\DashboardModule\Dashboard\DashboardModel";}',
'locked' => '1',
'translations' => [
[
'id' => '12',
'field_id' => '12',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.dashboard.name',
'placeholder' => 'anomaly.module.dashboard::field.dashboard.placeholder',
'warning' => 'anomaly.module.dashboard::field.dashboard.warning',
'instructions' => 'anomaly.module.dashboard::field.dashboard.instructions',
],
],
],
'translations' => [
[
'id' => '13',
'assignment_id' => '13',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.dashboard.label.widgets',
'warning' => 'anomaly.module.dashboard::field.dashboard.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.dashboard.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.dashboard.instructions.widgets',
],
],
],
[
'id' => '14',
'sort_order' => '14',
'stream_id' => '3',
'field_id' => '13',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '13',
'namespace' => 'dashboard',
'slug' => 'allowed_roles',
'type' => 'anomaly.field_type.multiple',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\UsersModule\Role\RoleModel";}',
'locked' => '1',
'translations' => [
[
'id' => '13',
'field_id' => '13',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.allowed_roles.name',
'placeholder' => 'anomaly.module.dashboard::field.allowed_roles.placeholder',
'warning' => 'anomaly.module.dashboard::field.allowed_roles.warning',
'instructions' => 'anomaly.module.dashboard::field.allowed_roles.instructions',
],
],
],
'translations' => [
[
'id' => '14',
'assignment_id' => '14',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.allowed_roles.label.widgets',
'warning' => 'anomaly.module.dashboard::field.allowed_roles.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.allowed_roles.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.allowed_roles.instructions.widgets',
],
],
],
[
'id' => '15',
'sort_order' => '15',
'stream_id' => '3',
'field_id' => '11',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '11',
'namespace' => 'dashboard',
'slug' => 'pinned',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '11',
'field_id' => '11',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::field.pinned.name',
'placeholder' => 'anomaly.module.dashboard::field.pinned.placeholder',
'warning' => 'anomaly.module.dashboard::field.pinned.warning',
'instructions' => 'anomaly.module.dashboard::field.pinned.instructions',
],
],
],
'translations' => [
[
'id' => '15',
'assignment_id' => '15',
'locale' => 'en',
'label' => 'anomaly.module.dashboard::field.pinned.label.widgets',
'warning' => 'anomaly.module.dashboard::field.pinned.warning.widgets',
'placeholder' => 'anomaly.module.dashboard::field.pinned.placeholder.widgets',
'instructions' => 'anomaly.module.dashboard::field.pinned.instructions.widgets',
],
],
],
],
'translations' => [
[
'id' => '3',
'stream_id' => '3',
'locale' => 'en',
'name' => 'anomaly.module.dashboard::stream.widgets.name',
'description' => 'anomaly.module.dashboard::stream.widgets.description',
],
],
];

    
public function dashboard()
{

return $this->getFieldType('dashboard')->getRelation();
}

public function allowedRoles()
{

return $this->getFieldType('allowed_roles')->getRelation();
}

}
