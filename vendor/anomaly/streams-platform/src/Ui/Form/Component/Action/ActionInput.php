<?php namespace Anomaly\Streams\Platform\Ui\Form\Component\Action;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ActionInput
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ActionInput
{

    /**
     * The action parser.
     *
     * @var ActionParser
     */
    protected $parser;

    /**
     * The action lookup.
     *
     * @var ActionLookup
     */
    protected $lookup;

    /**
     * The action guesser.
     *
     * @var ActionGuesser
     */
    protected $guesser;

    /**
     * The resolver utility.
     *
     * @var ActionResolver
     */
    protected $resolver;

    /**
     * The action defaults utility.
     *
     * @var ActionDefaults
     */
    protected $defaults;

    /**
     * The action dropdown utility.
     *
     * @var ActionDropdown
     */
    protected $dropdown;

    /**
     * The action predictor.
     *
     * @var ActionPredictor
     */
    protected $predictor;

    /**
     * The action normalizer.
     *
     * @var ActionNormalizer
     */
    protected $normalizer;

    /**
     * Create an ActionInput instance.
     *
     * @param ActionParser     $parser
     * @param ActionLookup     $lookup
     * @param ActionGuesser    $guesser
     * @param ActionResolver   $resolver
     * @param ActionDefaults   $defaults
     * @param ActionDropdown   $dropdown
     * @param ActionPredictor  $predictor
     * @param ActionNormalizer $normalizer
     */
    public function __construct(
        ActionParser $parser,
        ActionLookup $lookup,
        ActionGuesser $guesser,
        ActionResolver $resolver,
        ActionDefaults $defaults,
        ActionDropdown $dropdown,
        ActionPredictor $predictor,
        ActionNormalizer $normalizer
    ) {
        $this->parser     = $parser;
        $this->lookup     = $lookup;
        $this->guesser    = $guesser;
        $this->resolver   = $resolver;
        $this->defaults   = $defaults;
        $this->dropdown   = $dropdown;
        $this->predictor  = $predictor;
        $this->normalizer = $normalizer;
    }

    /**
     * Read builder action input.
     *
     * @param FormBuilder $builder
     */
    public function read(FormBuilder $builder)
    {
        $this->resolver->resolve($builder);
        $this->defaults->defaults($builder);
        $this->predictor->predict($builder);
        $this->normalizer->normalize($builder);
        $this->dropdown->flatten($builder);
        $this->guesser->guess($builder);
        $this->lookup->merge($builder);
        $this->parser->parse($builder);
        $this->dropdown->build($builder);
    }
}
