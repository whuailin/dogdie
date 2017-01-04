<?php namespace Anomaly\EditorFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\Support\Template;
use Illuminate\View\Factory;

/**
 * Class EditorFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class EditorFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The decorated field type.
     * This is for IDE hinting.
     *
     * @var EditorFieldType
     */
    protected $object;

    /**
     * The template parser.
     *
     * @var Template
     */
    protected $template;

    /**
     * Create a new EditorFieldTypePresenter instance.
     *
     * @param Factory  $view
     * @param Template $template
     * @param          $object
     */
    public function __construct(Factory $view, Template $template, $object)
    {
        $this->view     = $view;
        $this->template = $template;

        parent::__construct($object);
    }

    /**
     * Return the applicable path.
     *
     * @return null|string
     */
    public function path()
    {
        if (in_array($this->object->extension(), ['html', 'twig'])) {
            return $this->object->getViewPath();
        } else {
            return $this->object->getAssetPath();
        }
    }

    /**
     * Return the rendered content.
     *
     * @param  array  $payload
     * @return string
     */
    public function render(array $payload = [])
    {
        return $this->view->make($this->path(), $payload)->render();
    }

    /**
     * Return the rendered content.
     *
     * @param  array  $payload
     * @return string
     * @deprecated deprecated since version 2.0
     */
    public function rendered(array $payload = [])
    {
        return $this->render($payload);
    }

    /**
     * Return the parsed content.
     *
     * @param  array  $payload
     * @return string
     */
    public function parse(array $payload = [])
    {
        return $this->template->render($this->content(), (new Decorator())->decorate($payload));
    }

    /**
     * Return the parsed content.
     *
     * @param  array  $payload
     * @return string
     * @deprecated deprecated since version 2.0
     */
    public function parsed(array $payload = [])
    {
        return $this->parse($payload);
    }

    /**
     * Return the content.
     *
     * @return string
     */
    public function content()
    {
        return $this->object->getValue();
    }

    /**
     * Return the parsed content.
     *
     * @return string
     */
    public function __toString()
    {
        if (!$this->object->getValue()) {
            return '';
        }

        if (in_array($this->object->extension(), ['html', 'twig'])) {
            return $this->render();
        } else {
            return $this->content();
        }
    }
}
