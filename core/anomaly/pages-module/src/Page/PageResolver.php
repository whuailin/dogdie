<?php namespace Anomaly\PagesModule\Page;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Illuminate\Routing\Route;

/**
 * Class PageResolver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PageResolver
{

    /**
     * The page repository.
     *
     * @var PageRepositoryInterface
     */
    protected $pages;

    /**
     * The active route.
     *
     * @var Route
     */
    protected $route;

    /**
     * Create a new PageResolver instance.
     *
     * @param PageRepositoryInterface $pages
     * @param Route                   $route
     */
    public function __construct(PageRepositoryInterface $pages, Route $route)
    {
        $this->pages = $pages;
        $this->route = $route;
    }

    /**
     * Resolve the page.
     *
     * @return Contract\PageInterface|null
     */
    public function resolve()
    {
        $action = $this->route->getAction();

        if ($id = array_get($action, 'anomaly.module.pages::page')) {
            return $this->pages->find($id);
        }

        if ($path = array_get($action, 'anomaly.module.pages::path')) {
            return $this->pages->findByPath($path);
        }

        return null;
    }
}
