<?php namespace Anomaly\FilesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class FilesModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FilesModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'file-image';

    /**
     * The addon sections.
     *
     * @var array
     */
    protected $sections = [
        'files'   => [
            'buttons' => [
                'upload' => [
                    'data-toggle' => 'modal',
                    'icon'        => 'upload',
                    'data-target' => '#modal',
                    'type'        => 'success',
                    'href'        => 'admin/files/choose',
                ],
            ],
        ],
        'folders' => [
            'buttons' => [
                'new_folder',
                'assign_fields' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'enabled'     => 'admin/files/folders/assignments/*',
                    'href'        => 'admin/files/folders/choose/{request.route.parameters.id}',
                ],
            ],
        ],
        'disks'   => [
            'buttons' => [
                'new_disk' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/files/disks/choose',
                ],
            ],
        ],
        'fields'  => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/files/fields/choose',
                ],
            ],
        ],
    ];

}
