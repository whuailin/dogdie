<?php namespace Anomaly\ColorpickerFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class ColorpickerFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ColorpickerFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The colorpicker field type.
     *
     * @var ColorpickerFieldType
     */
    protected $object;

    /**
     * Return the hex code only.
     *
     * @return string
     */
    public function code()
    {
        $value = $this->object->getValue();

        if ($this->object->config('format') != 'hex') {
            $value = $this->hex();
        }

        return ltrim($value, '#');
    }

    /**
     * Return the color as a hexadecimal value.
     *
     * @return string
     */
    public function hex()
    {
        $value = $this->object->getValue();

        if ($this->object->config('format') == 'hex') {
            return $value;
        }

        $levels = $this->levels();

        $hex = "#";
        $hex .= str_pad(dechex($levels['red']), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($levels['green']), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($levels['blue']), 2, "0", STR_PAD_LEFT);

        return $hex;
    }

    /**
     * Return the color as an RGB value.
     *
     * @return string
     */
    public function rgb()
    {
        $levels = $this->levels();

        return 'rgb(' . $levels['red'] . ', ' . $levels['green'] . ', ' . $levels['blue'] . ')';
    }

    /**
     * Return the color as an RGB value.
     *
     * @return string
     */
    public function rgba()
    {
        $levels = $this->levels();

        return 'rgb(' . $levels['red'] . ', ' . $levels['green'] . ', ' . $levels['blue'] . ', ' . $levels['opacity'] . ')';
    }

    /**
     * Return the channel levels of the color.
     *
     * @return array
     */
    public function levels()
    {
        $value = $this->object->getValue();

        if ($this->object->config('format') != 'hex') {

            $value = explode(',', trim(str_replace($this->object->config('format'), null, $value), '()'));

            return [
                'red'   => $value[0],
                'green' => $value[1],
                'blue'  => $value[2],
                'opacity' > array_get($value, 3, 1),
            ];
        } else {

            $hex = str_replace("#", "", $value);

            if (strlen($hex) == 3) {
                $red   = hexdec($hex[0] . $hex[0]);
                $green = hexdec($hex[1] . $hex[1]);
                $blue  = hexdec($hex[2] . $hex[2]);
            } else {
                $red   = hexdec($hex[0] . $hex[1]);
                $green = hexdec($hex[2] . $hex[3]);
                $blue  = hexdec($hex[4] . $hex[5]);
            }

            return compact('red', 'green', 'blue');
        }
    }

    /**
     * Return the red level in the color.
     *
     * @return string
     */
    public function red()
    {
        return $this->levels()['red'];
    }

    /**
     * Return the red level in the color.
     *
     * @return string
     */
    public function green()
    {
        return $this->levels()['green'];
    }

    /**
     * Return the red level in the color.
     *
     * @return string
     */
    public function blue()
    {
        return $this->levels()['blue'];
    }

    /**
     * Return the red level in the color.
     *
     * @return string
     */
    public function opacity()
    {
        return array_get($this->levels(), 'opacity', 1);
    }
}
