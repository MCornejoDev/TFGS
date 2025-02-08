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
            'title' => 'Create Map',
            'btn' => 'Create',
            'form' => [
                'name' => 'Name',
                'link' => 'Link',
                'extension' => 'Extension',
                'placeholder' => [
                    'name' => 'Map name',
                    'link' => 'Select a map',
                ],
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
        'update' => [
            'title' => 'Update Map',
            'btn' => 'Update',
            'form' => [
                'name' => 'Name',
                'link' => 'Link',
                'extension' => 'Extension',
                'placeholder' => [
                    'name' => 'Map name',
                    'link' => 'Select a map',
                ],
                'success' => [
                    'title' => 'Map updated',
                    'description' => 'The map has been updated successfully',
                ],
                'error' => [
                    'title' => 'Error updating the map',
                    'description' => 'There was an error updating the map',
                ],
            ],
        ],
        'delete' => [
            'title' => 'Delete map',
            'description' => 'Are you sure you want to delete this map?',
            'accept' => 'Delete',
            'reject' => 'Cancel',
            'success' => [
                'title' => 'Map deleted',
                'description' => 'The map has been deleted successfully',
            ],
            'error' => [
                'title' => 'Error deleting the map',
                'description' => 'There was an error deleting the map',
            ],
        ],
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
