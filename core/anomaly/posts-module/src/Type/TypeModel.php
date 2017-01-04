<?php namespace Anomaly\PostsModule\Type;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\PostsModule\Post\PostCollection;
use Anomaly\PostsModule\Type\Command\GetTypeStream;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Model\Posts\PostsTypesEntryModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class TypeModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypeModel extends PostsTypesEntryModel implements TypeInterface
{

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->desciption;
    }

    /**
     * Get the related entry stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream()
    {
        return $this->dispatch(new GetTypeStream($this));
    }

    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName()
    {
        $stream = $this->getEntryStream();

        return $stream->getEntryModelName();
    }

    /**
     * Get the theme layout.
     *
     * @return string
     */
    public function getThemeLayout()
    {
        return $this->theme_layout;
    }

    /**
     * Get related posts.
     *
     * @return PostCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Return the posts relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Anomaly\PostsModule\Post\PostModel', 'type_id');
    }
}
