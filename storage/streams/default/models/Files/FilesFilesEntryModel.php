<?php namespace Anomaly\Streams\Platform\Model\Files;

use Anomaly\Streams\Platform\Entry\EntryModel;

class FilesFilesEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = true;

    protected $table = 'files_files';

    protected $titleName = 'name';

    protected $rules = [
'name' => 'required',
'disk' => 'required',
'folder' => 'required',
'extension' => 'required',
'size' => 'required',
'mime_type' => 'required',
'entry' => '',
'keywords' => '',
'height' => '',
'width' => '',
];

    protected $fields = [
'name',
'disk',
'folder',
'extension',
'size',
'mime_type',
'entry',
'keywords',
'height',
'width',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = ['disk', 'folder', 'entry'];

    

    

    

    protected $stream = [
'id' => '6',
'namespace' => 'files',
'slug' => 'files',
'prefix' => 'files_',
'title_column' => 'name',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '0',
'searchable' => '1',
'trashable' => '1',
'translatable' => '0',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '25',
'sort_order' => '25',
'stream_id' => '6',
'field_id' => '14',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '14',
'namespace' => 'files',
'slug' => 'name',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '14',
'field_id' => '14',
'locale' => 'en',
'name' => 'anomaly.module.files::field.name.name',
'placeholder' => 'anomaly.module.files::field.name.placeholder',
'warning' => 'anomaly.module.files::field.name.warning',
'instructions' => 'anomaly.module.files::field.name.instructions',
],
],
],
'translations' => [
[
'id' => '25',
'assignment_id' => '25',
'locale' => 'en',
'label' => 'anomaly.module.files::field.name.label.files',
'warning' => 'anomaly.module.files::field.name.warning.files',
'placeholder' => 'anomaly.module.files::field.name.placeholder.files',
'instructions' => 'anomaly.module.files::field.name.instructions.files',
],
],
],
[
'id' => '26',
'sort_order' => '26',
'stream_id' => '6',
'field_id' => '18',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '18',
'namespace' => 'files',
'slug' => 'disk',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:34:"Anomaly\FilesModule\Disk\DiskModel";}',
'locked' => '1',
'translations' => [
[
'id' => '18',
'field_id' => '18',
'locale' => 'en',
'name' => 'anomaly.module.files::field.disk.name',
'placeholder' => 'anomaly.module.files::field.disk.placeholder',
'warning' => 'anomaly.module.files::field.disk.warning',
'instructions' => 'anomaly.module.files::field.disk.instructions',
],
],
],
'translations' => [
[
'id' => '26',
'assignment_id' => '26',
'locale' => 'en',
'label' => 'anomaly.module.files::field.disk.label.files',
'warning' => 'anomaly.module.files::field.disk.warning.files',
'placeholder' => 'anomaly.module.files::field.disk.placeholder.files',
'instructions' => 'anomaly.module.files::field.disk.instructions.files',
],
],
],
[
'id' => '27',
'sort_order' => '27',
'stream_id' => '6',
'field_id' => '17',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '17',
'namespace' => 'files',
'slug' => 'folder',
'type' => 'anomaly.field_type.relationship',
'config' => 'a:1:{s:7:"related";s:38:"Anomaly\FilesModule\Folder\FolderModel";}',
'locked' => '1',
'translations' => [
[
'id' => '17',
'field_id' => '17',
'locale' => 'en',
'name' => 'anomaly.module.files::field.folder.name',
'placeholder' => 'anomaly.module.files::field.folder.placeholder',
'warning' => 'anomaly.module.files::field.folder.warning',
'instructions' => 'anomaly.module.files::field.folder.instructions',
],
],
],
'translations' => [
[
'id' => '27',
'assignment_id' => '27',
'locale' => 'en',
'label' => 'anomaly.module.files::field.folder.label.files',
'warning' => 'anomaly.module.files::field.folder.warning.files',
'placeholder' => 'anomaly.module.files::field.folder.placeholder.files',
'instructions' => 'anomaly.module.files::field.folder.instructions.files',
],
],
],
[
'id' => '28',
'sort_order' => '28',
'stream_id' => '6',
'field_id' => '23',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '23',
'namespace' => 'files',
'slug' => 'extension',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '23',
'field_id' => '23',
'locale' => 'en',
'name' => 'anomaly.module.files::field.extension.name',
'placeholder' => 'anomaly.module.files::field.extension.placeholder',
'warning' => 'anomaly.module.files::field.extension.warning',
'instructions' => 'anomaly.module.files::field.extension.instructions',
],
],
],
'translations' => [
[
'id' => '28',
'assignment_id' => '28',
'locale' => 'en',
'label' => 'anomaly.module.files::field.extension.label.files',
'warning' => 'anomaly.module.files::field.extension.warning.files',
'placeholder' => 'anomaly.module.files::field.extension.placeholder.files',
'instructions' => 'anomaly.module.files::field.extension.instructions.files',
],
],
],
[
'id' => '29',
'sort_order' => '29',
'stream_id' => '6',
'field_id' => '27',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '27',
'namespace' => 'files',
'slug' => 'size',
'type' => 'anomaly.field_type.integer',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '27',
'field_id' => '27',
'locale' => 'en',
'name' => 'anomaly.module.files::field.size.name',
'placeholder' => 'anomaly.module.files::field.size.placeholder',
'warning' => 'anomaly.module.files::field.size.warning',
'instructions' => 'anomaly.module.files::field.size.instructions',
],
],
],
'translations' => [
[
'id' => '29',
'assignment_id' => '29',
'locale' => 'en',
'label' => 'anomaly.module.files::field.size.label.files',
'warning' => 'anomaly.module.files::field.size.warning.files',
'placeholder' => 'anomaly.module.files::field.size.placeholder.files',
'instructions' => 'anomaly.module.files::field.size.instructions.files',
],
],
],
[
'id' => '30',
'sort_order' => '30',
'stream_id' => '6',
'field_id' => '26',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '26',
'namespace' => 'files',
'slug' => 'mime_type',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '26',
'field_id' => '26',
'locale' => 'en',
'name' => 'anomaly.module.files::field.mime_type.name',
'placeholder' => 'anomaly.module.files::field.mime_type.placeholder',
'warning' => 'anomaly.module.files::field.mime_type.warning',
'instructions' => 'anomaly.module.files::field.mime_type.instructions',
],
],
],
'translations' => [
[
'id' => '30',
'assignment_id' => '30',
'locale' => 'en',
'label' => 'anomaly.module.files::field.mime_type.label.files',
'warning' => 'anomaly.module.files::field.mime_type.warning.files',
'placeholder' => 'anomaly.module.files::field.mime_type.placeholder.files',
'instructions' => 'anomaly.module.files::field.mime_type.instructions.files',
],
],
],
[
'id' => '31',
'sort_order' => '31',
'stream_id' => '6',
'field_id' => '19',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '19',
'namespace' => 'files',
'slug' => 'entry',
'type' => 'anomaly.field_type.polymorphic',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '19',
'field_id' => '19',
'locale' => 'en',
'name' => 'anomaly.module.files::field.entry.name',
'placeholder' => 'anomaly.module.files::field.entry.placeholder',
'warning' => 'anomaly.module.files::field.entry.warning',
'instructions' => 'anomaly.module.files::field.entry.instructions',
],
],
],
'translations' => [
[
'id' => '31',
'assignment_id' => '31',
'locale' => 'en',
'label' => 'anomaly.module.files::field.entry.label.files',
'warning' => 'anomaly.module.files::field.entry.warning.files',
'placeholder' => 'anomaly.module.files::field.entry.placeholder.files',
'instructions' => 'anomaly.module.files::field.entry.instructions.files',
],
],
],
[
'id' => '32',
'sort_order' => '32',
'stream_id' => '6',
'field_id' => '22',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '22',
'namespace' => 'files',
'slug' => 'keywords',
'type' => 'anomaly.field_type.tags',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '22',
'field_id' => '22',
'locale' => 'en',
'name' => 'anomaly.module.files::field.keywords.name',
'placeholder' => 'anomaly.module.files::field.keywords.placeholder',
'warning' => 'anomaly.module.files::field.keywords.warning',
'instructions' => 'anomaly.module.files::field.keywords.instructions',
],
],
],
'translations' => [
[
'id' => '32',
'assignment_id' => '32',
'locale' => 'en',
'label' => 'anomaly.module.files::field.keywords.label.files',
'warning' => 'anomaly.module.files::field.keywords.warning.files',
'placeholder' => 'anomaly.module.files::field.keywords.placeholder.files',
'instructions' => 'anomaly.module.files::field.keywords.instructions.files',
],
],
],
[
'id' => '33',
'sort_order' => '33',
'stream_id' => '6',
'field_id' => '25',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '25',
'namespace' => 'files',
'slug' => 'height',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '25',
'field_id' => '25',
'locale' => 'en',
'name' => 'anomaly.module.files::field.height.name',
'placeholder' => 'anomaly.module.files::field.height.placeholder',
'warning' => 'anomaly.module.files::field.height.warning',
'instructions' => 'anomaly.module.files::field.height.instructions',
],
],
],
'translations' => [
[
'id' => '33',
'assignment_id' => '33',
'locale' => 'en',
'label' => 'anomaly.module.files::field.height.label.files',
'warning' => 'anomaly.module.files::field.height.warning.files',
'placeholder' => 'anomaly.module.files::field.height.placeholder.files',
'instructions' => 'anomaly.module.files::field.height.instructions.files',
],
],
],
[
'id' => '34',
'sort_order' => '34',
'stream_id' => '6',
'field_id' => '24',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '24',
'namespace' => 'files',
'slug' => 'width',
'type' => 'anomaly.field_type.text',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '24',
'field_id' => '24',
'locale' => 'en',
'name' => 'anomaly.module.files::field.width.name',
'placeholder' => 'anomaly.module.files::field.width.placeholder',
'warning' => 'anomaly.module.files::field.width.warning',
'instructions' => 'anomaly.module.files::field.width.instructions',
],
],
],
'translations' => [
[
'id' => '34',
'assignment_id' => '34',
'locale' => 'en',
'label' => 'anomaly.module.files::field.width.label.files',
'warning' => 'anomaly.module.files::field.width.warning.files',
'placeholder' => 'anomaly.module.files::field.width.placeholder.files',
'instructions' => 'anomaly.module.files::field.width.instructions.files',
],
],
],
],
'translations' => [
[
'id' => '6',
'stream_id' => '6',
'locale' => 'en',
'name' => 'anomaly.module.files::stream.files.name',
'description' => 'anomaly.module.files::stream.files.description',
],
],
];

    
public function disk()
{

return $this->getFieldType('disk')->getRelation();
}

public function folder()
{

return $this->getFieldType('folder')->getRelation();
}

public function entry()
{

return $this->getFieldType('entry')->getRelation();
}

}
