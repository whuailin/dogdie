<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TagsFieldType\Command\ParseOptions;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Collection;

class TagsFieldTypeOptions
{
    use DispatchesJobs;

    /**
     * Handle the select options.
     *
     * @param TagsFieldType $fieldType
     */
    public function handle(TagsFieldType $fieldType)
    {
        $options = (array)array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        if ($options instanceof Collection && $options->isEmpty()) {
            $options = [];
        }

        if ($options instanceof Collection && is_object($first = $options->first())) {
            if ($first instanceof EntryInterface) {
                $value = $first->getTitleName();
            } else {
                $value = 'id';
            }

            $options = $options->pluck($value);
        }

        if ($options instanceof Collection && is_string($options->first())) {
            $options = $options->all();
        }

        $fieldType->setOptions($options);
    }
}
