<?php namespace Anomaly\SelectFieldType;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Anomaly\SelectFieldType\Command\ParseOptions;

class SelectFieldTypeOptions
{
    use DispatchesJobs;

    /**
     * Handle the select options.
     *
     * @param  SelectFieldType $fieldType
     * @return array
     */
    public function handle(SelectFieldType $fieldType, Container $container)
    {
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        if ($options instanceof \Closure) {
            $options = $container->call($options);
        }

        $fieldType->setOptions($options);
    }
}
