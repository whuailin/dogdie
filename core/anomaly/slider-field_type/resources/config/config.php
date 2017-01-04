<?php

return [
    'range'         => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'false' => 'anomaly.field_type.slider::config.range.disabled',
                'true'  => 'anomaly.field_type.slider::config.range.enabled',
                'min'   => 'anomaly.field_type.slider::config.range.min',
                'max'   => 'anomaly.field_type.slider::config.range.max',
            ],
        ],
    ],
    'min'           => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => 1,
        ],
        'rules'    => [
            'numeric',
        ],
    ],
    'max'           => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => 10,
        ],
        'rules'    => [
            'numeric',
        ],
    ],
    'step'          => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => 1,
        ],
        'rules'    => [
            'numeric',
        ],
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.text',
    ],
    'unit' => [
        'type' => 'anomaly.field_type.text',
    ],
];
