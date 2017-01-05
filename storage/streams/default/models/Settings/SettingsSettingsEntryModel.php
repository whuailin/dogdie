<?php namespace Anomaly\Streams\Platform\Model\Settings;

use Anomaly\Streams\Platform\Entry\EntryModel;

class SettingsSettingsEntryModel extends EntryModel
{

    

    protected $searchable = false;

    protected $table = 'settings_settings';

    protected $titleName = 'id';

    protected $rules = [
'key' => 'required|unique:settings_settings,key',
'value' => '',
];

    protected $fields = [
'key',
'value',
];

    protected $dates = ['created_at', 'updated_at'];

    protected $relationships = [];

    

    

    

    protected $stream = [
'id' => '16',
'namespace' => 'settings',
'slug' => 'settings',
'prefix' => 'settings_',
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
'id' => '97',
'sort_order' => '97',
'stream_id' => '16',
'field_id' => '87',
'config' => 'a:0:{}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '87',
'namespace' => 'settings',
'slug' => 'key',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '87',
'field_id' => '87',
'locale' => 'en',
'name' => 'anomaly.module.settings::field.key.name',
'placeholder' => 'anomaly.module.settings::field.key.placeholder',
'warning' => 'anomaly.module.settings::field.key.warning',
'instructions' => 'anomaly.module.settings::field.key.instructions',
],
],
],
'translations' => [
[
'id' => '97',
'assignment_id' => '97',
'locale' => 'en',
'label' => 'anomaly.module.settings::field.key.label.settings',
'warning' => 'anomaly.module.settings::field.key.warning.settings',
'placeholder' => 'anomaly.module.settings::field.key.placeholder.settings',
'instructions' => 'anomaly.module.settings::field.key.instructions.settings',
],
],
],
[
'id' => '98',
'sort_order' => '98',
'stream_id' => '16',
'field_id' => '88',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '88',
'namespace' => 'settings',
'slug' => 'value',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '88',
'field_id' => '88',
'locale' => 'en',
'name' => 'anomaly.module.settings::field.value.name',
'placeholder' => 'anomaly.module.settings::field.value.placeholder',
'warning' => 'anomaly.module.settings::field.value.warning',
'instructions' => 'anomaly.module.settings::field.value.instructions',
],
],
],
'translations' => [
[
'id' => '98',
'assignment_id' => '98',
'locale' => 'en',
'label' => 'anomaly.module.settings::field.value.label.settings',
'warning' => 'anomaly.module.settings::field.value.warning.settings',
'placeholder' => 'anomaly.module.settings::field.value.placeholder.settings',
'instructions' => 'anomaly.module.settings::field.value.instructions.settings',
],
],
],
],
'translations' => [
[
'id' => '16',
'stream_id' => '16',
'locale' => 'en',
'name' => 'anomaly.module.settings::stream.settings.name',
'description' => 'anomaly.module.settings::stream.settings.description',
],
],
];

    
}
