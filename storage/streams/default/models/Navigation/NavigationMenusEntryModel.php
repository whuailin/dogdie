<?php namespace Anomaly\Streams\Platform\Model\Navigation;

use Anomaly\Streams\Platform\Entry\EntryModel;

class NavigationMenusEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'navigation_menus';

    protected $titleName = 'name';

    protected $rules = [
'name' => 'required|unique:navigation_menus,name',
'slug' => 'required|unique:navigation_menus,slug',
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

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Navigation\NavigationMenusEntryTranslationsModel';

    protected $stream = [
'id' => '7',
'namespace' => 'navigation',
'slug' => 'menus',
'prefix' => 'navigation_',
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
'id' => '35',
'sort_order' => '35',
'stream_id' => '7',
'field_id' => '28',
'config' => 'a:0:{}',
'unique' => '1',
'required' => '1',
'translatable' => '1',
'field' => [
'id' => '28',
'namespace' => 'navigation',
'slug' => 'name',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '28',
'field_id' => '28',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.name.name',
'placeholder' => 'anomaly.module.navigation::field.name.placeholder',
'warning' => 'anomaly.module.navigation::field.name.warning',
'instructions' => 'anomaly.module.navigation::field.name.instructions',
],
],
],
'translations' => [
[
'id' => '35',
'assignment_id' => '35',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.name.label.menus',
'warning' => 'anomaly.module.navigation::field.name.warning.menus',
'placeholder' => 'anomaly.module.navigation::field.name.placeholder.menus',
'instructions' => 'anomaly.module.navigation::field.name.instructions.menus',
],
],
],
[
'id' => '36',
'sort_order' => '36',
'stream_id' => '7',
'field_id' => '32',
'config' => 'a:0:{}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '32',
'namespace' => 'navigation',
'slug' => 'slug',
'type' => 'anomaly.field_type.slug',
'config' => 'a:1:{s:7:"slugify";s:4:"name";}',
'locked' => '1',
'translations' => [
[
'id' => '32',
'field_id' => '32',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.slug.name',
'placeholder' => 'anomaly.module.navigation::field.slug.placeholder',
'warning' => 'anomaly.module.navigation::field.slug.warning',
'instructions' => 'anomaly.module.navigation::field.slug.instructions',
],
],
],
'translations' => [
[
'id' => '36',
'assignment_id' => '36',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.slug.label.menus',
'warning' => 'anomaly.module.navigation::field.slug.warning.menus',
'placeholder' => 'anomaly.module.navigation::field.slug.placeholder.menus',
'instructions' => 'anomaly.module.navigation::field.slug.instructions.menus',
],
],
],
[
'id' => '37',
'sort_order' => '37',
'stream_id' => '7',
'field_id' => '30',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '30',
'namespace' => 'navigation',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '30',
'field_id' => '30',
'locale' => 'en',
'name' => 'anomaly.module.navigation::field.description.name',
'placeholder' => 'anomaly.module.navigation::field.description.placeholder',
'warning' => 'anomaly.module.navigation::field.description.warning',
'instructions' => 'anomaly.module.navigation::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '37',
'assignment_id' => '37',
'locale' => 'en',
'label' => 'anomaly.module.navigation::field.description.label.menus',
'warning' => 'anomaly.module.navigation::field.description.warning.menus',
'placeholder' => 'anomaly.module.navigation::field.description.placeholder.menus',
'instructions' => 'anomaly.module.navigation::field.description.instructions.menus',
],
],
],
],
'translations' => [
[
'id' => '7',
'stream_id' => '7',
'locale' => 'en',
'name' => 'anomaly.module.navigation::stream.menus.name',
'description' => 'anomaly.module.navigation::stream.menus.description',
],
],
];

    
}
