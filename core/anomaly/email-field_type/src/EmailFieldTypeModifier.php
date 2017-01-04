<?php namespace Anomaly\EmailFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;

/**
 * Class EmailFieldTypeModifier
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class EmailFieldTypeModifier extends FieldTypeModifier
{

    /**
     * Modify the value.
     *
     * @param $value
     * @return null|string
     */
    public function modify($value)
    {
        if ($value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $value = null;
        }

        return parent::modify($value);
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return null|string
     */
    public function restore($value)
    {
        if ($value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $value = null;
        }

        return parent::restore($value);
    }
}
