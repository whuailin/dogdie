<?php namespace Anomaly\FilesFieldType;

use Anomaly\FilesFieldType\Table\ValueTableBuilder;
use Anomaly\FilesModule\File\FileModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class FilesFieldType
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FilesFieldType extends FieldType
{

    /**
     * No database column.
     *
     * @var bool
     */
    protected $columnType = false;

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.files::input';

    /**
     * The field type rules.
     *
     * @var array
     */
    protected $rules = [
        'array',
    ];

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [];

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
     * Return the ids.
     *
     * @return array|mixed|static
     */
    public function ids()
    {
        $value = $this->getValue();

        if (is_object($value)) {
            $value = $value->pluck('id')->all();
        }

        return array_filter($value);
    }

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        if ($min = array_get($this->getConfig(), 'min')) {
            $rules[] = 'min:' . $min;
        }

        if ($max = array_get($this->getConfig(), 'max')) {
            $rules[] = 'max:' . $max;
        }

        return $rules;
    }

    /**
     * Get the config.
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();

        array_set($config, 'folders', (array)$this->config('folders', []));

        return $config;
    }

    /**
     * Get the relation.
     *
     * @return BelongsToMany
     */
    public function getRelation()
    {
        $entry = $this->getEntry();

        return $entry->belongsToMany(
            array_get($this->config, 'related', 'Anomaly\FilesModule\File\FileModel'),
            $this->getPivotTableName(),
            'entry_id',
            'file_id'
        )->orderBy($this->getPivotTableName() . '.sort_order', 'ASC');
    }

    /**
     * Get the pivot table.
     *
     * @return string
     */
    public function getPivotTableName()
    {
        return $this->entry->getTableName() . '_' . $this->getField();
    }

    /**
     * Get the related model.
     *
     * @return null|FileModel
     */
    public function getRelatedModel()
    {
        return $this->container->make(array_get($this->getConfig(), 'related'), 'Anomaly\FilesModule\File\FileModel');
    }

    /**
     * Handle saving the form data ourselves.
     *
     * @param FormBuilder $builder
     */
    public function handle(FormBuilder $builder)
    {
        $entry = $builder->getFormEntry();

        // See the accessor for how IDs are handled.
        $entry->{$this->getField()} = $this->getPostValue();
    }

    /**
     * Get the post value.
     *
     * @param  null $default
     * @return array
     */
    public function getPostValue($default = null)
    {
        return array_filter(explode(',', parent::getPostValue($default)));
    }

    /**
     * Return the config key.
     *
     * @return string
     */
    public function configKey()
    {
        $key = md5(json_encode($this->getConfig()));

        $this->cache->put('files-field_type::' . $key, $this->getConfig(), 30);

        return $key;
    }

    /**
     * Value table.
     *
     * @return string
     */
    public function valueTable()
    {
        $table = app(ValueTableBuilder::class)
            ->setFieldType($this);

        $files = $this->getValue();

        // Arrays are from validatoin.
        if (!$files instanceof EntryCollection) {
            $table->setUploaded(array_unique($files));
        }

        return $table
            ->build()
            ->load()
            ->getTableContent();
    }
}
