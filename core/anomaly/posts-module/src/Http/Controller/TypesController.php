<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Type\Command\AddTypeBreadcrumb;
use Anomaly\PostsModule\Type\Command\AddTypeMetaTitle;
use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class TypesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypesController extends PublicController
{

    /**
     * Return an index of type posts.
     *
     * @param  TypeRepositoryInterface $categories
     * @param  PostRepositoryInterface $posts
     * @param                          $type
     * @return \Illuminate\View\View
     */
    public function index(TypeRepositoryInterface $categories, PostRepositoryInterface $posts, $type)
    {
        if (!$type = $categories->findBySlug($type)) {
            abort(404);
        }

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddTypeBreadcrumb($type));
        $this->dispatch(new AddTypeMetaTitle($type));

        $posts = $posts->findManyByType($type);

        return view('anomaly.module.posts::types/index', compact('type', 'posts'));
    }
}
