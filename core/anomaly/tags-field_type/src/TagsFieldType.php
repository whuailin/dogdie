<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\TagsFieldType\Command\BuildOptions;

/**
 * Class TagsFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TagsFieldType extends FieldType
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
    protected $inputView = 'anomaly.field_type.tags::input';

    /**
     * The field type rules.
     *
     * @var array
     */
    protected $rules = [
        'array',
        'filter_tags',
    ];

    /**
     * Custom validators.
     * i.e. 'rule' => ['message', 'handler']
     *
     * @var array
     */
    protected $validators = [
        'filter_tags' => [
            'message' => 'anomaly.field_type.tags::message.invalid_tags',
            'handler' => 'Anomaly\TagsFieldType\Validation\FilterValidator',
        ],
    ];

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'allow_creating_tags' => true,
        'handler'             => 'Anomaly\TagsFieldType\TagsFieldTypeOptions@handle',
    ];

    /**
     * The checkboxes options.
     *
     * @var null
     */
    protected $options = null;

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
     * @param  array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the validation value.
     *
     * Because the input does not provide
     * an array but we're expecting one, this
     * helps us out in standardizing the input
     * before modification and storage.
     *
     * @param  null  $default
     * @return array
     */
    public function getValidationValue($default = null)
    {
        return $this->getInputValue();
    }

    /**
     * Get the input value.
     *
     * Because the input does not provide
     * an array but we're expecting one, this
     * helps us out in standardizing the input
     * before modification and storage.
     *
     * @param  null  $default
     * @return array
     */
    public function getInputValue($default = null)
    {
        return array_filter(explode(',', parent::getValidationValue($default)));
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
}
