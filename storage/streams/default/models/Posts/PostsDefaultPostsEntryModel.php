<?php namespace Anomaly\Streams\Platform\Model\Posts;

use Anomaly\Streams\Platform\Entry\EntryModel;

class PostsDefaultPostsEntryModel extends EntryModel
{

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $searchable = false;

    protected $table = 'posts_default_posts';

    protected $titleName = 'id';

    protected $rules = [
'content' => '',
];

    protected $fields = [
'content',
];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $relationships = [];

    protected $translatedAttributes = ['content'];

    protected $translationForeignKey = 'entry_id';

    protected $translationModel = 'Anomaly\Streams\Platform\Model\Posts\PostsDefaultPostsEntryTranslationsModel';

    protected $stream = [
'id' => '24',
'namespace' => 'posts',
'slug' => 'default_posts',
'prefix' => 'posts_',
'title_column' => 'id',
'order_by' => 'id',
'locked' => '0',
'hidden' => '1',
'sortable' => '0',
'searchable' => '0',
'trashable' => '1',
'translatable' => '1',
'config' => 'a:0:{}',
'assignments' => [
[
'id' => '126',
'sort_order' => '126',
'stream_id' => '24',
'field_id' => '63',
'config' => 'a:0:{}',
'unique' => '0',
'required' => '0',
'translatable' => '1',
'field' => [
'id' => '63',
'namespace' => 'posts',
'slug' => 'content',
'type' => 'anomaly.field_type.wysiwyg',
'config' => 'a:0:{}',
'locked' => '0',
'translations' => [
[
'id' => '63',
'field_id' => '63',
'locale' => 'en',
'name' => 'anomaly.module.posts::field.content.name',
'placeholder' => 'anomaly.module.posts::field.content.placeholder',
'warning' => 'anomaly.module.posts::field.content.warning',
'instructions' => 'anomaly.module.posts::field.content.instructions',
],
],
],
'translations' => [
[
'id' => '126',
'assignment_id' => '126',
'locale' => 'en',
'label' => '',
'warning' => '',
'placeholder' => '',
'instructions' => '',
],
],
],
],
'translations' => [
[
'id' => '24',
'stream_id' => '24',
'locale' => 'en',
'name' => 'Default',
'description' => '',
],
],
];

    
}
