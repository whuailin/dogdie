<?php namespace Anomaly\FileFieldType;

use Anomaly\FileFieldType\Table\ValueTableBuilder;
use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FileFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FileFieldType extends FieldType
{

    /**
     * The underlying database column type
     *
     * @var string
     */
    protected $columnType = 'integer';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.file::input';

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'folders' => [],
    ];

    /**
     * The cache repository.
     *
     * @var Repository
     */
    protected $cache;

    /**
     * Create a new FileFieldType instance.
     *
     * @param Repository $cache
     */
    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Get the relation.
     *
     * @return BelongsTo
     */
    public function getRelation()
    {
        $entry = $this->getEntry();

        return $entry->belongsTo(
            array_get($this->config, 'related', 'Anomaly\FilesModule\File\FileModel'),
            $this->getColumnName()
        );
    }

    /**
     * Get the config.
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();

        $post = str_replace('M', '', ini_get('post_max_size'));
        $file = str_replace('M', '', ini_get('upload_max_filesize'));

        $server = $file > $post ? $post : $file;

        $max = array_get($config, 'max');

        if ($max && $max > $server) {
            $max = $server;
        }

        array_set($config, 'max', $max);

        array_set($config, 'folders', (array)$this->config('folders', []));

        return $config;
    }

    /**
     * Get the database column name.
     *
     * @return null|string
     */
    public function getColumnName()
    {
        return parent::getColumnName() . '_id';
    }

    /**
     * Return the config key.
     *
     * @return string
     */
    public function configKey()
    {
        $key = md5(json_encode($this->getConfig()));

        $this->cache->put('file-field_type::' . $key, $this->getConfig(), 30);

        return $key;
    }

    /**
     * Value table.
     *
     * @return string
     */
    public function valueTable()
    {
        $table = app(ValueTableBuilder::class);

        $file = $this->getValue();

        if ($file instanceof FileInterface) {
            $file = $file->getId();
        }

        return $table->setUploaded([$file])->build()->load()->getTableContent();
    }
}
