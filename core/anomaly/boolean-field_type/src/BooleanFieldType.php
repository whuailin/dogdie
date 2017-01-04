<?php namespace Anomaly\BooleanFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class BooleanFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class BooleanFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    public $columnType = 'boolean';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.boolean::filter';

    /**
     * The config array.
     *
     * @var array
     */
    protected $config = [
        'default_value' => false,
        'on_color'      => 'success',
        'off_color'     => 'danger',
    ];

    /**
     * Get the validation value.
     *
     * @param  null $default
     * @return bool
     */
    public function getValidationValue($default = null)
    {
        return $this->getPostValue() === true ?: null;
    }

    /**
     * Get the post value.
     *
     * @param  null $default
     * @return bool
     */
    public function getPostValue($default = null)
    {
        return filter_var(parent::getPostValue($default), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Return the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        return 'anomaly.field_type.boolean::' . $this->mode();
    }

    /**
     * Return the input mode.
     *
     * @return string
     */
    public function mode()
    {
        return $this->config('mode') ?: config('anomaly.field_type.boolean::input.mode', 'switch');
    }

    /**
     * Render the input.
     *
     * @return string
     */
    public function getAjaxInput()
    {
        return view('anomaly.field_type.boolean::ajax', ['field_type' => $this])->render();
    }

    /**
     * Return the symbolic icon input.
     *
     * @param $onIcon
     * @param $offIcon
     * @return string
     */
    public function getIconInput($onIcon = 'check-square-alt', $offIcon = '')
    {
        return view(
            'anomaly.field_type.boolean::icon',
            [
                'field_type' => $this,
                'on_icon'    => $onIcon,
                'off_icon'   => $offIcon,
            ]
        )->render();
    }
}
