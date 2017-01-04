<?php namespace Anomaly\Streams\Platform\Model\Redirects;

use Anomaly\Streams\Platform\Entry\EntryModel;

class RedirectsRedirectsEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'redirects_redirects';

    protected $titleName = 'from';

    protected $rules = [
'from' => 'required|unique:redirects_redirects,from',
'to' => 'required',
'status' => 'required',
'secure' => '',
];

    protected $fields = [
'from',
'to',
'status',
'secure',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    

    

    

    protected $stream = [
'id' => '15',
'namespace' => 'redirects',
'slug' => 'redirects',
'prefix' => 'redirects_',
'title_column' => 'from',
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
'id' => '93',
'sort_order' => '93',
'stream_id' => '15',
'field_id' => '83',
'config' => 'a:0:{}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '83',
'namespace' => 'redirects',
'slug' => 'from',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '83',
'field_id' => '83',
'locale' => 'en',
'name' => 'anomaly.module.redirects::field.from.name',
'placeholder' => 'anomaly.module.redirects::field.from.placeholder',
'warning' => 'anomaly.module.redirects::field.from.warning',
'instructions' => 'anomaly.module.redirects::field.from.instructions',
],
],
],
'translations' => [
[
'id' => '93',
'assignment_id' => '93',
'locale' => 'en',
'label' => 'anomaly.module.redirects::field.from.label.redirects',
'warning' => 'anomaly.module.redirects::field.from.warning.redirects',
'placeholder' => 'anomaly.module.redirects::field.from.placeholder.redirects',
'instructions' => 'anomaly.module.redirects::field.from.instructions.redirects',
],
],
],
[
'id' => '94',
'sort_order' => '94',
'stream_id' => '15',
'field_id' => '84',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '84',
'namespace' => 'redirects',
'slug' => 'to',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '84',
'field_id' => '84',
'locale' => 'en',
'name' => 'anomaly.module.redirects::field.to.name',
'placeholder' => 'anomaly.module.redirects::field.to.placeholder',
'warning' => 'anomaly.module.redirects::field.to.warning',
'instructions' => 'anomaly.module.redirects::field.to.instructions',
],
],
],
'translations' => [
[
'id' => '94',
'assignment_id' => '94',
'locale' => 'en',
'label' => 'anomaly.module.redirects::field.to.label.redirects',
'warning' => 'anomaly.module.redirects::field.to.warning.redirects',
'placeholder' => 'anomaly.module.redirects::field.to.placeholder.redirects',
'instructions' => 'anomaly.module.redirects::field.to.instructions.redirects',
],
],
],
[
'id' => '95',
'sort_order' => '95',
'stream_id' => '15',
'field_id' => '85',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '85',
'namespace' => 'redirects',
'slug' => 'status',
'type' => 'anomaly.field_type.select',
'config' => 'a:2:{s:13:"default_value";s:3:"301";s:7:"options";a:2:{i:301;s:49:"anomaly.module.redirects::field.status.option.301";i:302;s:49:"anomaly.module.redirects::field.status.option.302";}}',
'locked' => '1',
'translations' => [
[
'id' => '85',
'field_id' => '85',
'locale' => 'en',
'name' => 'anomaly.module.redirects::field.status.name',
'placeholder' => 'anomaly.module.redirects::field.status.placeholder',
'warning' => 'anomaly.module.redirects::field.status.warning',
'instructions' => 'anomaly.module.redirects::field.status.instructions',
],
],
],
'translations' => [
[
'id' => '95',
'assignment_id' => '95',
'locale' => 'en',
'label' => 'anomaly.module.redirects::field.status.label.redirects',
'warning' => 'anomaly.module.redirects::field.status.warning.redirects',
'placeholder' => 'anomaly.module.redirects::field.status.placeholder.redirects',
'instructions' => 'anomaly.module.redirects::field.status.instructions.redirects',
],
],
],
[
'id' => '96',
'sort_order' => '96',
'stream_id' => '15',
'field_id' => '86',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '86',
'namespace' => 'redirects',
'slug' => 'secure',
'type' => 'anomaly.field_type.boolean',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '86',
'field_id' => '86',
'locale' => 'en',
'name' => 'anomaly.module.redirects::field.secure.name',
'placeholder' => 'anomaly.module.redirects::field.secure.placeholder',
'warning' => 'anomaly.module.redirects::field.secure.warning',
'instructions' => 'anomaly.module.redirects::field.secure.instructions',
],
],
],
'translations' => [
[
'id' => '96',
'assignment_id' => '96',
'locale' => 'en',
'label' => 'anomaly.module.redirects::field.secure.label.redirects',
'warning' => 'anomaly.module.redirects::field.secure.warning.redirects',
'placeholder' => 'anomaly.module.redirects::field.secure.placeholder.redirects',
'instructions' => 'anomaly.module.redirects::field.secure.instructions.redirects',
],
],
],
],
'translations' => [
[
'id' => '15',
'stream_id' => '15',
'locale' => 'en',
'name' => 'anomaly.module.redirects::stream.redirects.name',
'description' => 'anomaly.module.redirects::stream.redirects.description',
],
],
];

    
}
