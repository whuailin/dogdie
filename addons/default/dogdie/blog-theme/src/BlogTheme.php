<?php namespace Dogdie\BlogTheme;

use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Command\AddPostsMetaTitle;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Theme\Theme;

class BlogTheme extends Theme
{

    /**
     * Display recent posts.
     *
     * @param  PostRepositoryInterface $posts
     * @return \Illuminate\View\View
     */
    public function index(PostRepositoryInterface $posts)
    {
        $posts = $posts->getRecent();

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddPostsMetaTitle());

        return view('dogdie.theme.blog::partials/index', compact('posts'));
    }

}