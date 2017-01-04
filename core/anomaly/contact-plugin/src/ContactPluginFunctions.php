<?php namespace Anomaly\ContactPlugin;

use Anomaly\Streams\Platform\Support\Hydrator;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Container\Container;

/**
 * Class ContactPluginFunctions
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ContactPluginFunctions
{

    /**
     * The hydrator utility.
     *
     * @var Hydrator
     */
    protected $hydrator;

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new ContactPluginFunctions instance.
     *
     * @param Hydrator  $hydrator
     * @param Container $container
     */
    function __construct(Hydrator $hydrator, Container $container)
    {
        $this->hydrator  = $hydrator;
        $this->container = $container;
    }

    /**
     * Return a stream entry form.
     *
     * @param  array $parameters
     * @return $this
     */
    public function form(array $parameters = [])
    {
        if (!$builder = array_get($parameters, 'builder')) {
            $builder = 'Anomaly\ContactPlugin\Form\ContactFormBuilder';
        }

        /* @var FormBuilder $builder */
        $builder = $this->container->make($builder);

        $this->hydrator->hydrate($builder, $parameters);

        $builder->make();

        return $builder->getFormPresenter();
    }
}
