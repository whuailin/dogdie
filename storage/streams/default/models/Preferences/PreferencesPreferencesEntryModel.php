<?php namespace Anomaly\Streams\Platform\Model\Preferences;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PreferencesPreferencesEntryModel extends EntryModel
{

    

    protected $searchable = false;

    protected $table = 'preferences_preferences';

    protected $titleName = 'id';

    protected $rules = [
'user' => 'required',
'key' => 'required',
'value' => '',
];

    protected $fields = [
'user',
'key',
'value',
];

    protected $dates = ['created_at', 'updated_at'];

    protected $relationships = ['user'];

    

    

    

    protected $stream = [
'id' => '14',
'namespace' => 'preferences',
'slug' => 'preferences',
'prefix' => 'preferences_',
'title_column' => 'id',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '0',
'searchable' => '0',
'trashable' => '0',
'translatable' => '0',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '90',
'sort_order' => '90',
'stream_id' => '14',
'field_id' => '80',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '80',
'namespace' => 'preferences',
'slug' => 'user',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:2:{s:4:"mode";s:6:"lookup";s:7:"related";s:34:"Anomaly\UsersModule\User\UserModel";}',
'locked' => '1',
'translations' => [
[
'id' => '80',
'field_id' => '80',
'locale' => 'en',
'name' => 'anomaly.module.preferences::field.user.name',
'placeholder' => 'anomaly.module.preferences::field.user.placeholder',
'warning' => 'anomaly.module.preferences::field.user.warning',
'instructions' => 'anomaly.module.preferences::field.user.instructions',
],
],
],
'translations' => [
[
'id' => '90',
'assignment_id' => '90',
'locale' => 'en',
'label' => 'anomaly.module.preferences::field.user.label.preferences',
'warning' => 'anomaly.module.preferences::field.user.warning.preferences',
'placeholder' => 'anomaly.module.preferences::field.user.placeholder.preferences',
'instructions' => 'anomaly.module.preferences::field.user.instructions.preferences',
],
],
],
[
'id' => '91',
'sort_order' => '91',
'stream_id' => '14',
'field_id' => '81',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '81',
'namespace' => 'preferences',
'slug' => 'key',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '81',
'field_id' => '81',
'locale' => 'en',
'name' => 'anomaly.module.preferences::field.key.name',
'placeholder' => 'anomaly.module.preferences::field.key.placeholder',
'warning' => 'anomaly.module.preferences::field.key.warning',
'instructions' => 'anomaly.module.preferences::field.key.instructions',
],
],
],
'translations' => [
[
'id' => '91',
'assignment_id' => '91',
'locale' => 'en',
'label' => 'anomaly.module.preferences::field.key.label.preferences',
'warning' => 'anomaly.module.preferences::field.key.warning.preferences',
'placeholder' => 'anomaly.module.preferences::field.key.placeholder.preferences',
'instructions' => 'anomaly.module.preferences::field.key.instructions.preferences',
],
],
],
[
'id' => '92',
'sort_order' => '92',
'stream_id' => '14',
'field_id' => '82',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '82',
'namespace' => 'preferences',
'slug' => 'value',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '82',
'field_id' => '82',
'locale' => 'en',
'name' => 'anomaly.module.preferences::field.value.name',
'placeholder' => 'anomaly.module.preferences::field.value.placeholder',
'warning' => 'anomaly.module.preferences::field.value.warning',
'instructions' => 'anomaly.module.preferences::field.value.instructions',
],
],
],
'translations' => [
[
'id' => '92',
'assignment_id' => '92',
'locale' => 'en',
'label' => 'anomaly.module.preferences::field.value.label.preferences',
'warning' => 'anomaly.module.preferences::field.value.warning.preferences',
'placeholder' => 'anomaly.module.preferences::field.value.placeholder.preferences',
'instructions' => 'anomaly.module.preferences::field.value.instructions.preferences',
],
],
],
],
'translations' => [
[
'id' => '14',
'stream_id' => '14',
'locale' => 'en',
'name' => 'anomaly.module.preferences::stream.preferences.name',
'description' => 'anomaly.module.preferences::stream.preferences.description',
],
],
];

    
public function user()
{

return $this->getFieldType('user')->getRelation();
}

}
