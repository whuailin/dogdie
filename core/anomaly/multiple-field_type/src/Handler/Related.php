<?php namespace Anomaly\MultipleFieldType\Handler;

use Anomaly\MultipleFieldType\MultipleFieldType;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Related
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Related
{

    /**
     * Handle the options.
     *
     * @param  MultipleFieldType $fieldType
     * @return array
     */
    public function handle(MultipleFieldType $fieldType)
    {
        $model = $fieldType->getRelatedModel();

        /* @var Builder $query */
        $query = $model->newQuery();

        /* @var EloquentCollection $results */
        $results = $query->get();

        $fieldType->setOptions(
            $results->pluck(
                $fieldType->config('title_name', $model->getTitleName()),
                $fieldType->config('key_name', $model->getKeyName())
            )->all()
        );
    }
}
