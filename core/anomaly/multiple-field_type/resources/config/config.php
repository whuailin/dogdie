<?php

use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

return [
    'related' => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => function (\Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface $streams) {

                $options = [];

                /* @var StreamInterface as $stream */
                foreach ($streams->visible() as $stream) {
                    $options[ucwords(str_replace('_', ' ', $stream->getNamespace()))][$stream->getEntryModelName(
                    )] = $stream->getName();
                }

                foreach ($options as $namespace) {
                    ksort($namespace);
                }

                ksort($options);

                return $options;
            },
        ],
    ],
    'mode'    => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => [
                'tags'   => 'anomaly.field_type.multiple::config.mode.option.tags',
                'lookup' => 'anomaly.field_type.multiple::config.mode.option.lookup',
            ],
        ],
    ],
    'min'     => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1,
        ],
    ],
    'max'     => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1,
        ],
    ],
];
