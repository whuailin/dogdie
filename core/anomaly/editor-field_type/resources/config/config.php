<?php

use Illuminate\Contracts\Config\Repository;

return [
    'mode'          => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => function (Repository $config) {
                return array_combine(
                    array_keys($config->get('anomaly.field_type.editor::editor.modes')),
                    array_map(
                        function ($mode) {
                            return $mode['name'];
                        },
                        $config->get('anomaly.field_type.editor::editor.modes')
                    )
                );
            },
        ],
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.textarea',
    ],
    'height'        => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => 500,
            'min'           => 200,
            'step'          => 50,
        ],
    ],
    'word_wrap'     => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options'       => [
                'yes' => 'streams::misc.yes',
                'no'  => 'streams::misc.no',
            ],
            'default_value' => 'yes',
        ],
    ],

];
