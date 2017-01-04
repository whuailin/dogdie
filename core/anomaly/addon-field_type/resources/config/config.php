<?php

return [
    'type'       => [
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => [
                'field_type' => 'streams::addon.field_types',
                'extension'  => 'streams::addon.extensions',
                'module'     => 'streams::addon.modules',
                'plugin'     => 'streams::addon.plugins',
                'theme'      => 'streams::addon.themes',
            ],
        ],
    ],
    'search'     => [
        'type' => 'anomaly.field_type.text',
    ],
    'theme_type' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'admin'    => 'anomaly.field_type.addon::config.theme_type.admin',
                'standard' => 'anomaly.field_type.addon::config.theme_type.public',
            ],
        ],
    ],
];
