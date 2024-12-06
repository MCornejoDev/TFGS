<?php

return [
    'maps' => 'Maps',

    'empty' => 'No maps found',

    'table' => [
        'name' => 'Name',
        'link' => 'Link',
        'extension' => 'Extension',
        'actions' => 'Actions',
    ],

    'actions' => [
        'history' => 'History',
        'information' => 'Information',
        'create' => [
            'btn' => 'Create',
            'form' => [
                'name' => 'Name',
                'link' => 'Link',
                'extension' => 'Extension',
                'submit' => 'Create',
                'success' => [
                    'title' => 'Map created',
                    'description' => 'The map has been created successfully',
                ],
                'error' => [
                    'title' => 'Error creating the map',
                    'description' => 'There was an error creating the map',
                ],
            ],
        ],
        'delete' => 'Delete',
    ],

    'filters' => [
        'title' => 'Filters',
        'search' => [
            'placeholder' => 'Search by name, link',
        ],
        'date_start' => [
            'label' => 'Date Start',
            'placeholder' => 'Date Start',
        ],
        'extension' => [
            'select' => 'Select an extension',
        ],
        'actions' => [
            'loading' => 'Loading...',
            'clear' => 'Clear',
        ],
    ],
];
