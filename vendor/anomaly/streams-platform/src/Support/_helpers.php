<?php

use Anomaly\Streams\Platform\Support\Parser;
use Anomaly\Streams\Platform\Support\Template;
use Anomaly\Streams\Platform\Support\Value;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

if (!function_exists('parse')) {

    /**
     * Parse the target with data.
     *
     * @param       $target
     * @param array $data
     * @return mixed    The parsed target.
     */
    function parse($target, array $data = [])
    {
        return app(Parser::class)->parse($target, $data);
    }
}

if (!function_exists('render')) {

    /**
     * Render the string template.
     *
     * @param       $template
     * @param array $payload
     * @return string
     */
    function render($template, array $payload = [])
    {
        return app(Template::class)->render($template, $payload);
    }
}

if (!function_exists('valuate')) {

    /**
     * Make a valuation.
     *
     * @param        $parameters
     * @param        $entry
     * @param string $term
     * @param array  $payload
     * @return mixed
     */
    function valuate($parameters, $entry, $term = 'entry', $payload = [])
    {
        return app(Value::class)->make($parameters, $entry, $term, $payload);
    }
}

if (!function_exists('data')) {

    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed        $target
     * @param  string|array $key
     * @param  mixed        $default
     * @return mixed
     */
    function data($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (!is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (!is_array($target)) {
                    return value($default);
                }

                $result = Arr::pluck($target, $key);

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } elseif (is_object($target) && method_exists($target, $segment)) {
                // This is different than laravel..
                $target = call_user_func([$target, $segment]);
            } else {
                return value($default);
            }
        }

        return $target;
    }
}
