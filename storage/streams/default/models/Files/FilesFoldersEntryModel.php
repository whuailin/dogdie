<?php namespace Anomaly\Streams\Platform\Model\Files;

use Anomaly\Streams\Platform\Entry\EntryModel;

class FilesFoldersEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'files_folders';

    protected $titleName = 'name';

    protected $rules = [
'disk' => 'required',
'name' => 'required',
'slug' => 'required|unique:files_folders,slug',
'description' => '',
'allowed_types' => '',
];

    protected $fields = [
'disk',
'name',
'slug',
'description',
'allowed_types',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = ['disk'];

    protected $translatedAttributes = ['name', 'description'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Files\FilesFoldersEntryTranslationsModel';

    protected $stream = [
'id' => '5',
'namespace' => 'files',
'slug' => 'folders',
'prefix' => 'files_',
'title_column' => 'name',
'order_by' => 'id',
'locked' => '0',
'hidden' => '0',
'sortable' => '1',
'searchable' => '0',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '20',
'sort_order' => '20',
'stream_id' => '5',
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
'id' => '20',
'assignment_id' => '20',
'locale' => 'en',
'label' => 'anomaly.module.files::field.disk.label.folders',
'warning' => 'anomaly.module.files::field.disk.warning.folders',
'placeholder' => 'anomaly.module.files::field.disk.placeholder.folders',
'instructions' => 'anomaly.module.files::field.disk.instructions.folders',
],
],
],
[
'id' => '21',
'sort_order' => '21',
'stream_id' => '5',
'field_id' => '14',
'config' => 'a:1:{s:3:"max";i:50;}',
'unique' => '0',
'required' => '1',
'translatable' => '1',
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
'id' => '21',
'assignment_id' => '21',
'locale' => 'en',
'label' => 'anomaly.module.files::field.name.label.folders',
'warning' => 'anomaly.module.files::field.name.warning.folders',
'placeholder' => 'anomaly.module.files::field.name.placeholder.folders',
'instructions' => 'anomaly.module.files::field.name.instructions.folders',
],
],
],
[
'id' => '22',
'sort_order' => '22',
'stream_id' => '5',
'field_id' => '15',
'config' => 'a:1:{s:3:"max";i:50;}',
'unique' => '1',
'required' => '1',
'translatable' => '0',
'field' => [
'id' => '15',
'namespace' => 'files',
'slug' => 'slug',
'type' => 'anomaly.field_type.slug',
'config' => 'a:1:{s:7:"slugify";s:4:"name";}',
'locked' => '1',
'translations' => [
[
'id' => '15',
'field_id' => '15',
'locale' => 'en',
'name' => 'anomaly.module.files::field.slug.name',
'placeholder' => 'anomaly.module.files::field.slug.placeholder',
'warning' => 'anomaly.module.files::field.slug.warning',
'instructions' => 'anomaly.module.files::field.slug.instructions',
],
],
],
'translations' => [
[
'id' => '22',
'assignment_id' => '22',
'locale' => 'en',
'label' => 'anomaly.module.files::field.slug.label.folders',
'warning' => 'anomaly.module.files::field.slug.warning.folders',
'placeholder' => 'anomaly.module.files::field.slug.placeholder.folders',
'instructions' => 'anomaly.module.files::field.slug.instructions.folders',
],
],
],
[
'id' => '23',
'sort_order' => '23',
'stream_id' => '5',
'field_id' => '20',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '20',
'namespace' => 'files',
'slug' => 'description',
'type' => 'anomaly.field_type.textarea',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '20',
'field_id' => '20',
'locale' => 'en',
'name' => 'anomaly.module.files::field.description.name',
'placeholder' => 'anomaly.module.files::field.description.placeholder',
'warning' => 'anomaly.module.files::field.description.warning',
'instructions' => 'anomaly.module.files::field.description.instructions',
],
],
],
'translations' => [
[
'id' => '23',
'assignment_id' => '23',
'locale' => 'en',
'label' => 'anomaly.module.files::field.description.label.folders',
'warning' => 'anomaly.module.files::field.description.warning.folders',
'placeholder' => 'anomaly.module.files::field.description.placeholder.folders',
'instructions' => 'anomaly.module.files::field.description.instructions.folders',
],
],
],
[
'id' => '24',
'sort_order' => '24',
'stream_id' => '5',
'field_id' => '21',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '0',
'field' => [
'id' => '21',
'namespace' => 'files',
'slug' => 'allowed_types',
'type' => 'anomaly.field_type.tags',
'config' => 'a:0:{}',
'locked' => '1',
'translations' => [
[
'id' => '21',
'field_id' => '21',
'locale' => 'en',
'name' => 'anomaly.module.files::field.allowed_types.name',
'placeholder' => 'anomaly.module.files::field.allowed_types.placeholder',
'warning' => 'anomaly.module.files::field.allowed_types.warning',
'instructions' => 'anomaly.module.files::field.allowed_types.instructions',
],
],
],
'translations' => [
[
'id' => '24',
'assignment_id' => '24',
'locale' => 'en',
'label' => 'anomaly.module.files::field.allowed_types.label.folders',
'warning' => 'anomaly.module.files::field.allowed_types.warning.folders',
'placeholder' => 'anomaly.module.files::field.allowed_types.placeholder.folders',
'instructions' => 'anomaly.module.files::field.allowed_types.instructions.folders',
],
],
],
],
'translations' => [
[
'id' => '5',
'stream_id' => '5',
'locale' => 'en',
'name' => 'anomaly.module.files::stream.folders.name',
'description' => 'anomaly.module.files::stream.folders.description',
],
],
];

    
public function disk()
{

return $this->getFieldType('disk')->getRelation();
}

}
