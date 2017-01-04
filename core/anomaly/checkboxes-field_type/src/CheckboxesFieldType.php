<?php namespace Anomaly\CheckboxesFieldType;

use Anomaly\CheckboxesFieldType\Command\BuildOptions;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class CheckboxesFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\Streams\Addon\FieldType\Checkboxes
 */
class CheckboxesFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    public $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = null;

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.checkboxes::filter';

    /**
     * The field type rules.
     *
     * @var array
     */
    protected $rules = [
        'array'
    ];

    /**
     * The option handlers.
     *
     * @var array
     */
    protected $handlers = [
        'states'    => 'Anomaly\CheckboxesFieldType\Handler\States',
        'countries' => 'Anomaly\CheckboxesFieldType\Handler\Countries',
    ];

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'options' => null,
        'mode'    => 'checkboxes',
        'handler' => 'Anomaly\CheckboxesFieldType\CheckboxesFieldTypeOptions@handle'
    ];

    /**
     * The checkboxes options.
     *
     * @var null
     */
    protected $options = null;

    /**
     * Get the dropdown options.
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
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the handlers.
     *
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlers;
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
     * Return the required flag.
     *
     * @return bool
     */
    public function isRequired()
    {
        if ((!$required = parent::isRequired()) && array_get($this->getConfig(), 'min')) {
            return true;
        }

        return $required;
    }

    /**
     * Return the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        if ($this->inputView) {
            return $this->inputView;
        }

        return 'anomaly.field_type.checkboxes::' . $this->config('mode', 'checkboxes');
    }
}
