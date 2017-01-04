<?php namespace Anomaly\SliderFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class SliderFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SliderFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the top value.
     *
     * @return null|integer|float
     */
    public function top()
    {
        $values = $this->values();

        return array_pop($values);
    }

    /**
     * Return the bottom value.
     *
     * @return null|integer|float
     */
    public function bottom()
    {
        $values = $this->values();

        return array_shift($values);
    }

    /**
     * Return the values.
     *
     * @return array
     */
    public function values()
    {
        return explode(',', $this->object->getValue());
    }
}
