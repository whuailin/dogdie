<?php namespace Anomaly\Streams\Platform\Database\Migration\Field;

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\Streams\Platform\Database\Migration\Field\FieldGuesser;
use Anomaly\Streams\Platform\Database\Migration\Field\FieldNormalizer;
use Illuminate\Contracts\Config\Repository;

class FieldInput
{

    /**
     * The field guesser.
     *
     * @var FieldGuesser
     */
    protected $guesser;

    /**
     * The field normalizer.
     *
     * @var FieldNormalizer
     */
    protected $normalizer;

    /**
     * Create a new FieldInput instance.
     *
     * @param FieldGuesser    $guesser
     * @param FieldNormalizer $normalizer
     */
    public function __construct(FieldGuesser $guesser, FieldNormalizer $normalizer)
    {
        $this->guesser    = $guesser;
        $this->normalizer = $normalizer;
    }

    /**
     * Read the fields input.
     *
     * @param Migration $migration
     */
    public function read(Migration $migration)
    {
        $this->normalizer->normalize($migration);
        $this->guesser->guess($migration);
    }
}
