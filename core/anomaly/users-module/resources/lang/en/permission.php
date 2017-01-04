<?php

return [
    'users'    => [
        'name'   => 'Users',
        'option' => [
            'read'         => 'Can access users section.',
            'write'        => 'Can create and edit users.',
            'write_admins' => 'Can create and edit admins.',
            'delete'       => 'Can delete users.',
        ],
    ],
    'roles'    => [
        'name'   => 'Roles',
        'option' => [
            'read'   => 'Can access roles section.',
            'write'  => 'Can create and edit roles.',
            'delete' => 'Can delete roles.',
        ],
    ],
    'fields'   => [
        'name'   => 'Fields',
        'option' => [
            'manage' => 'Can manage custom fields.',
        ],
    ],
    'settings' => [
        'name'   => 'Settings',
        'option' => [
            'manage' => 'Can manage addon settings.',
        ],
    ],
];
