<?php namespace Anomaly\Streams\Platform\Model\Configuration;

use Anomaly\Streams\Platform\Entry\EntryModel;

class ConfigurationConfigurationEntryModel extends EntryModel
{

    

    protected $searchable = false;

    protected $table = 'configuration_configuration';

    protected $titleName = 'id';

    protected $rules = [
'scope' => 'required',
'key' => 'required',
'value' => '',
];

    protected $fields = [
'scope',
'key',
'value',
];

    protected $dates = ['created_at', 'updated_at'];

    protected $relationships = [];

    

    

    

    protected $stream = [
'id' => '1',
'namespace' => 'configuration',
'slug' => 'configuration',
'prefix' => 'configuration_',
'title_column' => 'id',
'order_by' => 'id',
'locked' => '1',
'hidden' => '0',
'sortable' => '0',
'searchable' => '0',
'trashable' => '0',
'translatable' => '0',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '1',
'sort_order' => '1',
'stream_id' => '1',
'field_id' => '1',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '1',
'namespace' => 'configuration',
'slug' => 'scope',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '1',
'field_id' => '1',
'locale' => 'en',
'name' => 'anomaly.module.configuration::field.scope.name',
'placeholder' => 'anomaly.module.configuration::field.scope.placeholder',
'warning' => 'anomaly.module.configuration::field.scope.warning',
'instructions' => 'anomaly.module.configuration::field.scope.instructions',
],
],
],
'translations' => [
[
'id' => '1',
'assignment_id' => '1',
'locale' => 'en',
'label' => 'anomaly.module.configuration::field.scope.label.configuration',
'warning' => 'anomaly.module.configuration::field.scope.warning.configuration',
'placeholder' => 'anomaly.module.configuration::field.scope.placeholder.configuration',
'instructions' => 'anomaly.module.configuration::field.scope.instructions.configuration',
],
],
],
[
'id' => '2',
'sort_order' => '2',
'stream_id' => '1',
'field_id' => '2',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '2',
'namespace' => 'configuration',
'slug' => 'key',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '2',
'field_id' => '2',
'locale' => 'en',
'name' => 'anomaly.module.configuration::field.key.name',
'placeholder' => 'anomaly.module.configuration::field.key.placeholder',
'warning' => 'anomaly.module.configuration::field.key.warning',
'instructions' => 'anomaly.module.configuration::field.key.instructions',
],
],
],
'translations' => [
[
'id' => '2',
'assignment_id' => '2',
'locale' => 'en',
'label' => 'anomaly.module.configuration::field.key.label.configuration',
'warning' => 'anomaly.module.configuration::field.key.warning.configuration',
'placeholder' => 'anomaly.module.configuration::field.key.placeholder.configuration',
'instructions' => 'anomaly.module.configuration::field.key.instructions.configuration',
],
],
],
[
'id' => '3',
'sort_order' => '3',
'stream_id' => '1',
'field_id' => '3',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '3',
'namespace' => 'configuration',
'slug' => 'value',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '3',
'field_id' => '3',
'locale' => 'en',
'name' => 'anomaly.module.configuration::field.value.name',
'placeholder' => 'anomaly.module.configuration::field.value.placeholder',
'warning' => 'anomaly.module.configuration::field.value.warning',
'instructions' => 'anomaly.module.configuration::field.value.instructions',
],
],
],
'translations' => [
[
'id' => '3',
'assignment_id' => '3',
'locale' => 'en',
'label' => 'anomaly.module.configuration::field.value.label.configuration',
'warning' => 'anomaly.module.configuration::field.value.warning.configuration',
'placeholder' => 'anomaly.module.configuration::field.value.placeholder.configuration',
'instructions' => 'anomaly.module.configuration::field.value.instructions.configuration',
],
],
],
],
'translations' => [
[
'id' => '1',
'stream_id' => '1',
'locale' => 'en',
'name' => 'anomaly.module.configuration::stream.configuration.name',
'description' => 'anomaly.module.configuration::stream.configuration.description',
],
],
];

    
}
