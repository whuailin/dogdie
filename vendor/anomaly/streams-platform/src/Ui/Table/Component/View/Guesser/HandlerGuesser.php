<?php namespace Anomaly\Streams\Platform\Ui\Table\Component\View\Guesser;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class HandlerGuesser
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class HandlerGuesser
{

    /**
     * Guess the handler for the views.
     *
     * @param TableBuilder $builder
     */
    public function guess(TableBuilder $builder)
    {
        $views = $builder->getViews();

        foreach ($views as &$view) {

            // Only automate it if not set.
            if (!isset($view['handler'])) {
                if (class_exists($class = $this->guessClass($builder, $view))) {
                    $view['handler'] = $class . '@handle';
                }
            }
        }

        $builder->setViews($views);
    }

    /**
     * Guess the query class from the builder.
     *
     * @param  TableBuilder $builder
     * @param  array        $view
     * @return string
     */
    protected function guessClass(TableBuilder $builder, array $view)
    {
        $class = explode('\\', get_class($builder));

        array_pop($class);

        return implode('\\', $class) . '\\View\\' . ucfirst(camel_case($view['slug'])) . 'Handler';
    }
}
