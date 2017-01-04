<?php

return [
    'type'          => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'text'     => 'anomaly.field_type.text::config.type.option.text',
                'email'    => 'anomaly.field_type.text::config.type.option.email',
                'password' => 'anomaly.field_type.text::config.type.option.password',
            ],
        ],
    ],
    'min'           => [
        'type' => 'anomaly.field_type.integer',
    ],
    'max'           => [
        'type' => 'anomaly.field_type.integer',
    ],
    'show_counter'  => [
        'type' => 'anomaly.field_type.boolean',
    ],
    'suggested'     => [
        'type' => 'anomaly.field_type.integer',
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.text',
    ],
];
