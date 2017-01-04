<?php

return [
    'mode'          => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'dropdown',
            'options'       => [
                'dropdown' => 'anomaly.field_type.select::config.mode.option.dropdown',
                'radio'    => 'anomaly.field_type.select::config.mode.option.radio',
            ],
        ],
    ],
    'options'       => [
        'required' => true,
        'type'     => 'anomaly.field_type.textarea',
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.text',
    ],
];
