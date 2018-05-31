<?php

return [
    'languages' => [ 'en', 'de' ],

    'page' => [
        'model' => \App\Page::class,
        'entity_title' => [' Page', 'Pages'],
        'entity_name' => 'page',
        'fields' => [
            'title' => 'Title',
            'is_startpage' => [
                'label' => 'Startpage',
                'type' => 'checkbox',
            ],
            'description' => [
                'label' => 'Description',
                'type' => 'textarea',
            ],
        ]
    ]
];