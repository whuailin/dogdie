<?php namespace Anomaly\Streams\Platform\Ui\Table\Component\Column\Contract;

/**
 * Interface ColumnInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ColumnInterface
{

    /**
     * Get the wrapper.
     *
     * @return null|string
     */
    public function getWrapper();

    /**
     * Set the wrapper.
     *
     * @param $wrapper
     * @return $this
     */
    public function setWrapper($wrapper);

    /**
     * Get the view.
     *
     * @return null|string
     */
    public function getView();

    /**
     * Set the view.
     *
     * @param $view
     * @return $this
     */
    public function setView($view);

    /**
     * Set the column class.
     *
     * @param $class
     * @return $this
     */
    public function setClass($class);

    /**
     * Get the column class.
     *
     * @return null|string
     */
    public function getClass();

    /**
     * Set the column header.
     *
     * @param $header
     * @return $this
     */
    public function setHeader($header);

    /**
     * Get the column header.
     *
     * @return null|string
     */
    public function getHeader();

    /**
     * Set the column value.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value);

    /**
     * Get the column value.
     *
     * @return mixed|null
     */
    public function getValue();

    /**
     * Get the entry.
     *
     * @return mixed|null
     */
    public function getEntry();

    /**
     * Set the entry.
     *
     * @param $entry
     * @return $this
     */
    public function setEntry($entry);
}
