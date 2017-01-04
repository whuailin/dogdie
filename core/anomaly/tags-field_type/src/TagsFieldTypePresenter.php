<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

class TagsFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var TagsFieldType
     */
    protected $object;

    /**
     * Return the tags wrapped in labels.
     *
     * @param  string $class
     * @return string
     */
    public function labels($class = 'label-default')
    {
        return array_map(
            function ($tag) use ($class) {
                return '<span class="label ' . $class . '">' . $tag . '</span>';
            },
            $this->object->getValue()
        );
    }

    /**
     * Return the string form of the value.
     *
     * @return string
     */
    public function __toString()
    {
        if (!$value = $this->object->getValue()) {
            return '';
        }

        return json_encode($value);
    }
}
