<?php namespace Anomaly\CheckboxesFieldType\Command;

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

        foreach (explode("\n", $this->options) as $option) {

            // Split on the first ":"
            if (str_is('*:*', $option)) {
                $option = explode(':', $option, 2);
            } else {
                $option = [$option, $option];
            }

            $key   = array_shift($option);
            $value = $option ? array_shift($option) : $key;

            $options[ltrim(trim($key, "\r\n"), "\r\n")] = ltrim(trim($value, "\r\n"), "\r\n");
        }

        return $options;
    }
}
