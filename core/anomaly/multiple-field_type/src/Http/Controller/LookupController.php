<?php namespace Anomaly\MultipleFieldType\Http\Controller;

use Anomaly\MultipleFieldType\Command\GetConfiguration;
use Anomaly\MultipleFieldType\Command\HydrateLookupTable;
use Anomaly\MultipleFieldType\Command\HydrateSelectedTable;
use Anomaly\MultipleFieldType\MultipleFieldType;
use Anomaly\MultipleFieldType\Table\LookupTableBuilder;
use Anomaly\MultipleFieldType\Table\SelectedTableBuilder;
use Anomaly\MultipleFieldType\Table\ValueTableBuilder;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Support\Collection;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Container\Container;

/**
 * Class LookupController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class LookupController extends AdminController
{

    /**
     * Return an index of entries from related stream.
     *
     * @param  Container                                  $container
     * @param                                             $key
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Container $container, $key)
    {
        /* @var Collection $config */
        $config = $this->dispatch(new GetConfiguration($key));

        $related = $container->make($config->get('related'));

        if ($table = $config->get('lookup_table')) {
            $table = $container->make($table);
        } else {
            $table = $related->newMultipleFieldTypeLookupTableBuilder();
        }

        /* @var LookupTableBuilder $table */
        $table->setConfig($config)
            ->setModel($related);

        return $table->render();
    }

    /**
     * @param Container         $container
     * @param MultipleFieldType $fieldType
     * @param                   $key
     */
    public function json(Container $container, MultipleFieldType $fieldType, $key)
    {
        /* @var Collection $config */
        $config = $this->dispatch(new GetConfiguration($key));

        $fieldType->mergeConfig($config->all());

        /* @var EloquentModel $model */
        $model = $container->make($config->get('related'));

        $data = [];

        /* @var EntryInterface $item */
        foreach ($model->all() as $item) {
            $data[] = (object)[
                'id'   => $item->getId(),
                'text' => $item->getTitle(),
            ];
        }

        return $this->response->json($data);
    }

    /**
     * Return the selected entries.
     *
     * @param  SelectedTableBuilder $table
     * @param  MultipleFieldType    $fieldType
     * @param                       $key
     * @return null|string
     */
    public function selected(Container $container, MultipleFieldType $fieldType, $key)
    {
        /* @var Collection $config */
        $config = $this->dispatch(new GetConfiguration($key));

        $fieldType->mergeConfig($config->all());
        $fieldType->setField($config->get('field'));
        $fieldType->setEntry($this->container->make($config->get('entry')));

        $related = $container->make($config->get('related'));

        if ($table = $config->get('selected_table')) {
            $table = $container->make($table);
        } else {
            $table = $related->newMultipleFieldTypeSelectedTableBuilder();
        }

        /* @var SelectedTableBuilder $table */
        $table->setSelected(array_filter(explode(',', $this->request->get('uploaded'))))
            ->setModel($config->get('related'))
            ->setFieldType($fieldType)
            ->setConfig($config)
            ->build()
            ->load();

        return $table->getTableContent();
    }
}
