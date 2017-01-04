<?php namespace Anomaly\MultipleFieldType;

use Anomaly\MultipleFieldType\Command\BuildOptions;
use Anomaly\MultipleFieldType\Command\HydrateValueTable;
use Anomaly\MultipleFieldType\Table\ValueTableBuilder;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Support\Collection;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Container\Container;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class MultipleFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class MultipleFieldType extends FieldType
{
    use DispatchesJobs;

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
    protected $inputView = 'anomaly.field_type.multiple::input';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.multiple::filter';

    /**
     * The pre-defined handlers.
     *
     * @var array
     */
    protected $handlers = [
        //'fields'      => 'Anomaly\MultipleFieldType\Handler\Fields@handle',
        'related' => 'Anomaly\MultipleFieldType\Handler\Related@handle',
        //'assignments' => 'Anomaly\MultipleFieldType\Handler\Assignments@handle'
    ];

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
    protected $config = [
        'mode' => 'tags',
    ];

    /**
     * The select input options.
     *
     * @var null|array
     */
    protected $options = null;

    /**
     * The cache repository.
     *
     * @var Repository
     */
    protected $cache;

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new MultipleFieldType instance.
     *
     * @param Repository $cache
     * @param Container  $container
     */
    public function __construct(Repository $cache, Container $container)
    {
        $this->cache     = $cache;
        $this->container = $container;
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
     * Return the config key.
     *
     * @return string
     */
    public function key()
    {
        $this->cache->put(
            'anomaly/multiple-field_type::' . ($key = md5(json_encode($this->getConfig()))),
            array_merge(
                $this->getConfig(),
                [
                    'field' => $this->getField(),
                    'entry' => get_class($this->getEntry()),
                ]
            ),
            30
        );

        return $key;
    }

    /**
     * Value table.
     *
     * @return string
     */
    public function table()
    {
        $value   = $this->getValue();
        $related = $this->getRelatedModel();

        if ($table = $this->config('value_table')) {
            $table = $this->container->make($table);
        } else {
            $table = $related->newMultipleFieldTypeValueTableBuilder();
        }

        $table->setConfig(new Collection($this->getConfig()))
            ->setFieldType($this)
            ->setModel($related);

        if (!$value instanceof EntryCollection) {
            $table->setSelected($value);
        }

        return $table
            ->build()
            ->load()
            ->getTableContent();
    }

    /**
     * Get the relation.
     *
     * @return BelongsToMany
     */
    public function getRelation()
    {
        $entry = $this->getEntry();
        $model = $this->getRelatedModel();

        return $entry->belongsToMany(
            get_class($model),
            $this->getPivotTableName(),
            'entry_id',
            'related_id'
        )->orderBy($this->getPivotTableName() . '.sort_order', 'ASC');
    }

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions()
    {
        if ($this->options === null) {
            $this->dispatch(new BuildOptions($this));
        }

        return $this->options;
    }

    /**
     * Set the options.
     *
     * @param  array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the pre-defined handlers.
     *
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlers;
    }

    /**
     * Return the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        return 'anomaly.field_type.multiple::' . $this->config('mode');
    }

    /**
     * Get the related model.
     *
     * @return EloquentModel
     */
    public function getRelatedModel()
    {
        return $this->container->make(array_get($this->getConfig(), 'related'));
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
     * Get the post value.
     *
     * @param  null  $default
     * @return array
     */
    public function getPostValue($default = null)
    {
        if (is_array($value = parent::getPostValue($default))) {
            return array_filter($value);
        }

        return array_filter(explode(',', $value));
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
}
