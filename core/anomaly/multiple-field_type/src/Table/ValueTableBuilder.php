<?php namespace Anomaly\MultipleFieldType\Table;

use Anomaly\MultipleFieldType\MultipleFieldType;
use Anomaly\Streams\Platform\Support\Collection;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ValueTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ValueTableBuilder extends TableBuilder
{

    /**
     * The field type configuration.
     *
     * @var null|Collection
     */
    protected $config = null;

    /**
     * The field type.
     *
     * @var null|MultipleFieldType
     */
    protected $fieldType = null;

    /**
     * The selected entry.
     *
     * @var array
     */
    protected $selected = [];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'remove' => [
            'data-dismiss' => 'multiple',
            'data-entry'   => 'entry.id',
        ],
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'limit'            => 9999,
        'show_headers'     => false,
        'sortable_headers' => false,
        'table_view'       => 'anomaly.field_type.multiple::table/table',
    ];

    /**
     * Fired just before querying.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        $uploaded  = $this->getSelected();
        $fieldType = $this->getFieldType();

        /*
         * If we have the entry available then
         * we can determine saved sort order.
         */
        $table   = $fieldType->getPivotTableName();
        $related = $fieldType->getRelatedModel();
        $entry   = $fieldType->getEntry();

        if ($entry->getId() && $related && !$uploaded) {
            $query->join($table, $table . '.related_id', '=', $related->getTableName() . '.id');
            $query->where($table . '.entry_id', $entry->getId());
            $query->orderBy($table . '.sort_order', 'ASC');
        } elseif ($related) {
            $query->whereIn($related->getTableName() . '.id', $uploaded ?: [0]);
        }
    }

    /**
     * Return a config value.
     *
     * @param        $key
     * @param  null $default
     * @return mixed
     */
    public function config($key, $default = null)
    {
        return $this->config->get($key, $default);
    }

    /**
     * Get the config.
     *
     * @return Collection|null
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set the config.
     *
     * @param  Collection $config
     * @return $this
     */
    public function setConfig(Collection $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get the selected value.
     *
     * @return array
     */
    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * Get the selected value.
     *
     * @param  array $selected
     * @return $this
     */
    public function setSelected(array $selected)
    {
        $this->selected = $selected;

        return $this;
    }

    /**
     * Get the field type.
     *
     * @return MultipleFieldType|null
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * Set the field type.
     *
     * @param  MultipleFieldType $fieldType
     * @return $this
     */
    public function setFieldType(MultipleFieldType $fieldType)
    {
        $this->fieldType = $fieldType;

        return $this;
    }

    /**
     * Set the table entries.
     *
     * @param  \Illuminate\Support\Collection $entries
     * @return $this
     */
    public function setTableEntries(\Illuminate\Support\Collection $entries)
    {
        if (!$this->getFieldType()) {
            $entries = $entries->sort(
                function ($a, $b) {
                    return array_search($a->id, $this->getSelected()) - array_search($b->id, $this->getSelected());
                }
            );
        }

        return parent::setTableEntries($entries);
    }
}
