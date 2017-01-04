<?php namespace Anomaly\NavigationModule\Menu;

use Anomaly\NavigationModule\Link\LinkCollection;
use Anomaly\NavigationModule\Menu\Contract\MenuInterface;
use Anomaly\Streams\Platform\Model\Navigation\NavigationMenusEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class MenuModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class MenuModel extends NavigationMenusEntryModel implements MenuInterface
{

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
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the related links.
     *
     * @return LinkCollection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Return the links relation.
     *
     * @return HasMany
     */
    public function links()
    {
        return $this->hasMany('Anomaly\NavigationModule\Link\LinkModel', 'menu_id')
            ->orderBy('sort_order', 'ASC')
            ->orderBy('parent_id', 'ASC');
    }
}
