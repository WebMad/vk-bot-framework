<?php

return [
    'inline' => false,
    'buttons' => [
        [
            [
                'action' => [
                    'type' => 'text',
                    'payload' => json_encode([
                        'button' => 'example',
                        'keyboard' => 'example_keyboard',
                    ]),
                    "label" => "Пример кнопки",
                ],
                'color' => 'positive',
            ],
            [
                'action' => [
                    'type' => 'text',
                    'payload' => json_encode([
                        'button' => 'example2',
                        'keyboard' => 'example_keyboard',
                    ]),
                    "label" => "Пример кнопки 2",
                ],
                'color' => 'negative',
            ]
        ]
    ]
];