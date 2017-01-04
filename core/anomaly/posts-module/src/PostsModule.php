<?php namespace Anomaly\PostsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class PostsModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PostsModule extends Module
{

    /**
     * The module's icon.
     *
     * @var string
     */
    protected $icon = 'newspaper';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'posts'      => [
            'buttons' => [
                'new_post' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/posts/ajax/choose_type',
                ],
            ],
        ],
        'categories' => [
            'buttons' => [
                'new_category',
            ],
        ],
        'types'      => [
            'buttons' => [
                'new_type',
                'assign_fields' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'enabled'     => 'admin/posts/types/assignments/*',
                    'href'        => 'admin/posts/types/choose/{request.route.parameters.id}',
                ],
            ],
        ],
        'fields'     => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/posts/fields/choose',
                ],
            ],
        ],
    ];

}
