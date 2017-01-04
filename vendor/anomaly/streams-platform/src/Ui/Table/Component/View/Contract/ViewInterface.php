<?php namespace Anomaly\Streams\Platform\Ui\Table\Component\View\Contract;

/**
 * Interface ViewInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ViewInterface
{

    /**
     * Get the attributes.
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Set the attributes.
     *
     * @param  array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes);

    /**
     * Set the view handler.
     *
     * @param $handler
     * @return $this
     */
    public function setHandler($handler);

    /**
     * Get the view handler.
     *
     * @return mixed
     */
    public function getHandler();

    /**
     * Get the query.
     *
     * @return callable|null|string
     */
    public function getQuery();

    /**
     * Set the query.
     *
     * @param $query
     * @return $this
     */
    public function setQuery($query);

    /**
     * Set the active flag.
     *
     * @param  bool  $active
     * @return $this
     */
    public function setActive($active);

    /**
     * Get the active flag.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Set the view prefix.
     *
     * @param $prefix
     * @return $this
     */
    public function setPrefix($prefix);

    /**
     * Get the view prefix.
     *
     * @return string
     */
    public function getPrefix();

    /**
     * Set the view slug.
     *
     * @param $slug
     * @return $this
     */
    public function setSlug($slug);

    /**
     * Get the view slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set the view text.
     *
     * @param  string $text
     * @return $this
     */
    public function setText($text);

    /**
     * Get the view text.
     *
     * @return string
     */
    public function getText();

    /**
     * Get the icon.
     *
     * @return null|string
     */
    public function getIcon();

    /**
     * Set the icon.
     *
     * @param $icon
     * @return $this
     */
    public function setIcon($icon);

    /**
     * Get the buttons.
     *
     * @return null|array
     */
    public function getButtons();

    /**
     * Set the buttons.
     *
     * @param $buttons
     * @return $this
     */
    public function setButtons($buttons);

    /**
     * Get the actions.
     *
     * @return null|array
     */
    public function getActions();

    /**
     * Set the actions.
     *
     * @param $actions
     * @return $this
     */
    public function setActions($actions);
}
