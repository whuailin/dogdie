<?php namespace Anomaly\Streams\Platform\Ui\Form;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Contracts\Container\Container;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;

/**
 * Class FormExtender
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FormExtender
{

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new FormExtender instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Extend the validation factory.
     *
     * @param Factory     $factory
     * @param FormBuilder $builder
     */
    public function extend(Factory $factory, FormBuilder $builder)
    {
        foreach ($builder->getFormFields() as $fieldType) {
            $this->registerValidators($factory, $builder, $fieldType);
        }
    }

    /**
     * Register field's custom validators.
     *
     * @param Factory     $factory
     * @param FormBuilder $builder
     * @param FieldType   $fieldType
     */
    protected function registerValidators(Factory $factory, FormBuilder $builder, FieldType $fieldType)
    {
        foreach ($fieldType->getValidators() as $rule => $validator) {
            $handler = array_get($validator, 'handler');

            if (is_string($handler) && !str_contains($handler, '@')) {
                $handler .= '@handle';
            }

            $factory->extend(
                $rule,
                function ($attribute, $value, $parameters, Validator $validator) use ($handler, $builder, $fieldType) {
                    return $this->container->call(
                        $handler,
                        compact('attribute', 'value', 'parameters', 'builder', 'validator', 'fieldType')
                    );
                },
                array_get($validator, 'message')
            );
        }
    }
}
