<?php namespace Anomaly\ColorpickerFieldType\Command;

use Anomaly\ColorpickerFieldType\ColorpickerFieldType;
use Illuminate\Container\Container;


/**
 * Class BuildColors
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class BuildColors
{

    /**
     * The field type instance.
     *
     * @var ColorpickerFieldType
     */
    protected $fieldType;

    /**
     * Create a new BuildColors instance.
     *
     * @param ColorpickerFieldType $fieldType
     */
    function __construct(ColorpickerFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Container $container
     */
    public function handle(Container $container)
    {
        $container->call($this->fieldType->config('handler'), ['fieldType' => $this->fieldType]);
    }
}
