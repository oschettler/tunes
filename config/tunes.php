<?php

return [
    'languages' => [ 'en', 'de' ],

    'project' => [
        'model' => \App\Project::class,
        'entity_title' => [' Project', 'Projects'],
        'entity_name' => 'project',
        'order_by' => 'updated_at|desc',
        'show' => true,
        'has_file' => true,
        'multiple_files' => true,
        'deletes' => true,

        'columns' => [
            'title' => 'Title',
            'updated_at' => 'Last changed',
        ],

        'fields' => [
            'title' => 'Title',
            'is_startpage' => [
                'label' => 'Startpage',
                'type' => 'checkbox',
                'default' => false,
            ],
            'description' => [
                'label' => 'Description',
                'type' => 'textarea',
            ],
            'style' => [
                'label' => 'Style',
                'type' => 'textarea',
                'cols' => 6,
                'rows' => 10,
            ],
            'script' => [
                'label' => 'Script',
                'type' => 'textarea',
                'cols' => 6,
                'rows' => 10,
            ],
            'markup' => [
                'label' => 'Markup',
                'type' => 'textarea',
                'rows' => 10,
            ]
        ]
    ],
];