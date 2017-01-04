<?php namespace Anomaly\SelectFieldType\Command;



/**
 * Class ParseOptions
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ParseOptions
{

    /**
     * The string options.
     *
     * @var string
     */
    protected $options;

    /**
     * Create a new ParseOptions instance.
     *
     * @param $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * Handle the command.
     *
     * @return array
     */
    public function handle()
    {
        $options = [];

        $group = null;

        foreach (explode("\n", $this->options) as $option) {

            // Find option [groups]
            if (starts_with($option, '[')) {

                $group = trans(substr(trim($option), 1, -1));

                $options[$group] = [];

                continue;
            }

            // Split on the first ":"
            if (str_is('*:*', $option)) {
                $option = explode(':', $option, 2);
            } else {
                $option = [$option, $option];
            }

            $key   = ltrim(trim(array_shift($option)));
            $value = ltrim(trim($option ? array_shift($option) : $key));

            if ($group) {
                $options[$group][$key] = $value;
            } else {
                $options[$key] = $value;
            }
        }

        return $options;
    }
}
