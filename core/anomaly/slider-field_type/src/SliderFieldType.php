<?php namespace Anomaly\SliderFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class SliderFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SliderFieldType extends FieldType
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.slider::input';

    /**
     * The field config.
     *
     * @var array
     */
    protected $config = [
        'max'   => 10,
        'min'   => 0,
        'step'  => 1,
    ];

}
