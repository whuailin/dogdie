<?php namespace Anomaly\Streams\Platform\Support;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Value
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Value
{

    /**
     * The string parser.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * The template parser.
     *
     * @var Template
     */
    protected $template;

    /**
     * The evaluator utility.
     *
     * @var Evaluator
     */
    protected $evaluator;

    /**
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new ColumnValue instance.
     *
     * @param Parser    $parser
     * @param Template  $template
     * @param Evaluator $evaluator
     * @param Decorator $decorator
     */
    public function __construct(Parser $parser, Template $template, Evaluator $evaluator, Decorator $decorator)
    {
        $this->parser    = $parser;
        $this->template  = $template;
        $this->evaluator = $evaluator;
        $this->decorator = $decorator;
    }

    /**
     * Make a value from the parameters and entry.
     *
     * @param               $parameters
     * @param               $payload
     * @param  array        $payload
     * @return mixed|string
     */
    public function make($parameters, $entry, $term = 'entry', $payload = [])
    {
        $payload[$term] = $entry;

        /*
         * If a flat value was sent in
         * then convert it to an array.
         */
        if (!is_array($parameters)) {
            $parameters = [
                'value' => $parameters,
            ];
        }

        $value = array_get($parameters, 'value');

        /*
         * If the value is a view path then return a view.
         */
        if ($view = array_get($parameters, 'view')) {
            return view($view, ['value' => $value, $term => $entry]);
        }

        /*
         * If the value uses a template then parse it.
         */
        if ($template = array_get($parameters, 'template')) {
            return $this->template->render($template, ['value' => $value, $term => $entry]);
        }

        /*
         * If the entry is an instance of EntryInterface
         * then try getting the field value from the entry.
         */
        if ($entry instanceof EntryInterface && $entry->getField($value)) {

            /* @var EntryInterface $relation */
            if ($entry->assignmentIsRelationship($value) && $relation = $entry->{camel_case($value)}) {
                if ($relation instanceof EloquentModel) {
                    $value = $relation->getTitle();
                }
            } else {
                $value = $entry->getFieldValue($value);
            }
        }

        /*
         * Decorate the entry object before
         * sending to decorate so that data_get()
         * can get into the presenter methods.
         */
        $payload[$term] = $entry = $this->decorator->decorate($entry);

        /*
         * If the value matches a dot notation
         * then parse it as a template.
         */
        if (is_string($value) && preg_match("/^{$term}.([a-zA-Z\\_]+)/", $value, $match)) {
            $value = $this->template->render("{{ {$value}|raw }}", $payload);
        }

        /*
         * If the value matches a method in the presenter.
         */
        if (is_string($value) && preg_match("/^{$term}.([a-zA-Z\\_]+)/", $value, $match)) {
            if (method_exists($entry, camel_case($match[1]))) {
                $value = $entry->{camel_case($match[1])}();
            }
        }

        $payload[$term] = $entry;

        /*
         * By default we can just pass the value through
         * the evaluator utility and be done with it.
         */
        $value = $this->evaluator->evaluate($value, $payload);

        /*
         * Lastly, prepare the entry to be
         * parsed into the string.
         */
        if ($entry instanceof Arrayable) {
            $entry = $entry->toArray();
        }

        /*
         * Parse the value with the entry.
         */
        if ($wrapper = array_get($parameters, 'wrapper')) {
            $value = $this->parser->parse(
                $wrapper,
                ['value' => $value, $term => $entry]
            );
        }

        /*
         * Parse the value with the value too.
         */
        if (is_string($value)) {
            $value = $this->parser->parse(
                $value,
                [
                    'value' => $value,
                    $term   => $entry,
                ]
            );
        }

        /*
         * If the value looks like a language
         * key then try translating it.
         */
        if (is_string($value) && str_is('*.*.*::*', $value)) {
            $value = trans($value);
        }

        /*
         * If the value looks like a render-able
         * string then render it.
         */
        if (is_string($value) && str_contains($value, '{{')) {
            $value = $this->template->render($value, [$term => $entry]);
        }

        return $value;
    }
}
