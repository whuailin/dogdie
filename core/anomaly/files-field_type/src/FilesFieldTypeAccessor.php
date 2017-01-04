<?php namespace Anomaly\FilesFieldType;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class FilesFieldTypeAccessor
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FilesFieldTypeAccessor extends FieldTypeAccessor
{

    /**
     * The field type object.
     * This is for IDE support.
     *
     * @var FilesFieldType
     */
    protected $fieldType;

    /**
     * Set the value.
     *
     * @param $value
     */
    public function set($value)
    {
        if (is_array($value)) {
            $value = $this->organizeSyncValue($value);
        } elseif ($value instanceof Collection) {
            $value = $this->organizeSyncValue($value->all());
        } elseif ($value instanceof EntryInterface) {
            $value = $this->organizeSyncValue([$value->getId()]);
        }

        if (!$value) {
            $this->fieldType->getRelation()->detach();

            return;
        }

        $this->fieldType->getRelation()->sync($value);
    }

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function get()
    {
        return $this->fieldType->getRelation();
    }

    /**
     * Organize the value for sync.
     *
     * @param  array $value
     * @return array
     */
    protected function organizeSyncValue(array $value)
    {
        $value = array_filter(array_unique($value));

        return array_filter(
            array_combine(
                array_map(
                    function ($value) {
                        if (is_numeric($value)) {
                            return $value;
                        }

                        if ($value instanceof FileInterface) {
                            return $value->getId();
                        }

                        return null;
                    },
                    array_values($value)
                ),
                array_map(
                    function ($key) {
                        return ['sort_order' => $key];
                    },
                    array_keys($value)
                )
            )
        );
    }
}
