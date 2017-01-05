<?php namespace Anomaly\Streams\Platform\Model\Navigation;

use Anomaly\Streams\Platform\Entry\EntryModel;

class NavigationLinksEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'navigation_links';

    protected $titleName = 'id';

    protected $rules = [
'menu' => 'required',
'type' => 'required',
'entry' => 'required',
'target' => 'required',
'class' => '',
'parent' => '',
'allowed_roles' => '',
];

    protected $fields = [
'menu',
'type',
'entry',
'target',
'class',
'parent',
'allowed_roles',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = ['menu', 'entry', 'parent', 'allowed_roles'];

    

    

    

    protected $stream = [
'id' => '8',
'namespace' => 'navigation',
'slug' => 'links',
'prefix' => 'navigation_',
'title_column' => 'id',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '1',
'searchable' => '0',
'trashable' => '1',
'translatable' => '0',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '38',
'sort_order' => '38',
'stream_id' => '8',
'field_id' => '33',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '33',
'namespace' => 'navigation',
'slug' => 'menu',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:39:"Anomaly\NavigationModule\Menu\MenuModel";}',
'locked' => '1',
'translations' => [
[
'id' => '33',
'field_id' => '33',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.menu.name',
'placeholder' => 'anomaly.module.navigation::field.menu.placeholder',
'warning' => 'anomaly.module.navigation::field.menu.warning',
'instructions' => 'anomaly.module.navigation::field.menu.instructions',
],
],
],
'translations' => [
[
'id' => '38',
'assignment_id' => '38',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.menu.label.links',
'warning' => 'anomaly.module.navigation::field.menu.warning.links',
'placeholder' => 'anomaly.module.navigation::field.menu.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.menu.instructions.links',
],
],
],
[
'id' => '39',
'sort_order' => '39',
'stream_id' => '8',
'field_id' => '36',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '36',
'namespace' => 'navigation',
'slug' => 'type',
'type' => 'anomaly.field_type.addon',
'config' => 'a:2:{s:4:"type";s:9:"extension";s:6:"search";s:38:"anomaly.module.navigation::link_type.*";}',
'locked' => '1',
'translations' => [
[
'id' => '36',
'field_id' => '36',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.type.name',
'placeholder' => 'anomaly.module.navigation::field.type.placeholder',
'warning' => 'anomaly.module.navigation::field.type.warning',
'instructions' => 'anomaly.module.navigation::field.type.instructions',
],
],
],
'translations' => [
[
'id' => '39',
'assignment_id' => '39',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.type.label.links',
'warning' => 'anomaly.module.navigation::field.type.warning.links',
'placeholder' => 'anomaly.module.navigation::field.type.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.type.instructions.links',
],
],
],
[
'id' => '40',
'sort_order' => '40',
'stream_id' => '8',
'field_id' => '31',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '31',
'namespace' => 'navigation',
'slug' => 'entry',
'type' => 'anomaly.field_type.polymorphic',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '31',
'field_id' => '31',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.entry.name',
'placeholder' => 'anomaly.module.navigation::field.entry.placeholder',
'warning' => 'anomaly.module.navigation::field.entry.warning',
'instructions' => 'anomaly.module.navigation::field.entry.instructions',
],
],
],
'translations' => [
[
'id' => '40',
'assignment_id' => '40',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.entry.label.links',
'warning' => 'anomaly.module.navigation::field.entry.warning.links',
'placeholder' => 'anomaly.module.navigation::field.entry.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.entry.instructions.links',
],
],
],
[
'id' => '41',
'sort_order' => '41',
'stream_id' => '8',
'field_id' => '37',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '37',
'namespace' => 'navigation',
'slug' => 'target',
'type' => 'anomaly.field_type.select',
'config' => 'a:2:{s:13:"default_value";s:5:"_self";s:7:"options";a:2:{s:5:"_self";s:51:"anomaly.module.navigation::field.target.option.self";s:6:"_blank";s:52:"anomaly.module.navigation::field.target.option.blank";}}',
'locked' => '1',
'translations' => [
[
'id' => '37',
'field_id' => '37',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.target.name',
'placeholder' => 'anomaly.module.navigation::field.target.placeholder',
'warning' => 'anomaly.module.navigation::field.target.warning',
'instructions' => 'anomaly.module.navigation::field.target.instructions',
],
],
],
'translations' => [
[
'id' => '41',
'assignment_id' => '41',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.target.label.links',
'warning' => 'anomaly.module.navigation::field.target.warning.links',
'placeholder' => 'anomaly.module.navigation::field.target.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.target.instructions.links',
],
],
],
[
'id' => '42',
'sort_order' => '42',
'stream_id' => '8',
'field_id' => '29',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '29',
'namespace' => 'navigation',
'slug' => 'class',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '29',
'field_id' => '29',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.class.name',
'placeholder' => 'anomaly.module.navigation::field.class.placeholder',
'warning' => 'anomaly.module.navigation::field.class.warning',
'instructions' => 'anomaly.module.navigation::field.class.instructions',
],
],
],
'translations' => [
[
'id' => '42',
'assignment_id' => '42',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.class.label.links',
'warning' => 'anomaly.module.navigation::field.class.warning.links',
'placeholder' => 'anomaly.module.navigation::field.class.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.class.instructions.links',
],
],
],
[
'id' => '43',
'sort_order' => '43',
'stream_id' => '8',
'field_id' => '34',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '34',
'namespace' => 'navigation',
'slug' => 'parent',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:39:"Anomaly\NavigationModule\Link\LinkModel";}',
'locked' => '1',
'translations' => [
[
'id' => '34',
'field_id' => '34',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.parent.name',
'placeholder' => 'anomaly.module.navigation::field.parent.placeholder',
'warning' => 'anomaly.module.navigation::field.parent.warning',
'instructions' => 'anomaly.module.navigation::field.parent.instructions',
],
],
],
'translations' => [
[
'id' => '43',
'assignment_id' => '43',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.parent.label.links',
'warning' => 'anomaly.module.navigation::field.parent.warning.links',
'placeholder' => 'anomaly.module.navigation::field.parent.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.parent.instructions.links',
],
],
],
[
'id' => '44',
'sort_order' => '44',
'stream_id' => '8',
'field_id' => '35',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '35',
'namespace' => 'navigation',
'slug' => 'allowed_roles',
'type' => 'anomaly.field_type.multiple',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\UsersModule\Role\RoleModel";}',
'locked' => '1',
'translations' => [
[
'id' => '35',
'field_id' => '35',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.allowed_roles.name',
'placeholder' => 'anomaly.module.navigation::field.allowed_roles.placeholder',
'warning' => 'anomaly.module.navigation::field.allowed_roles.warning',
'instructions' => 'anomaly.module.navigation::field.allowed_roles.instructions',
],
],
],
'translations' => [
[
'id' => '44',
'assignment_id' => '44',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.allowed_roles.label.links',
'warning' => 'anomaly.module.navigation::field.allowed_roles.warning.links',
'placeholder' => 'anomaly.module.navigation::field.allowed_roles.placeholder.links',
'instructions' => 'anomaly.module.navigation::field.allowed_roles.instructions.links',
],
],
],
],
'translations' => [
[
'id' => '8',
'stream_id' => '8',
'locale' => 'en',
'name' => 'anomaly.module.navigation::stream.links.name',
'description' => 'anomaly.module.navigation::stream.links.description',
],
],
];

    
public function menu()
{

return $this->getFieldType('menu')->getRelation();
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
