<?php

return [
    'games' => 'Games',

    'empty' => 'No games found',

    'table' => [
        'name' => 'Name',
        'date_start' => 'Date Start',
        'comments' => 'Comments',
        'users' => 'Players in the game',
        'actions' => 'Actions',
    ],

    'filters' => [
        'title' => 'Filters',
        'search' => [
            'placeholder' => 'Search by name, comments',
        ],
        'date_start' => [
            'label' => 'Date Start',
            'placeholder' => 'Date Start',
        ],
        'actions' => [
            'loading' => 'Loading...',
            'clear' => 'Clear',
        ],
    ],

    'actions' => [
        'create' => [
            'title' => 'Create Game',
            'btn' => 'Create',
            'form' => [
                'name' => 'Name',
                'date_start' => 'Date Start',
                'comments' => 'Comments',
                'users' => 'Users',
                'placeholder' => [
                    'name' => 'Enter a name',
                    'date_start' => 'Enter a date',
                    'comments' => 'Enter a comments',
                    'users' => 'Select one or more users',
                ],
                'label' => [
                    'comments' => 'Comments',
                    'date_start' => 'Date Start',
                ],
                'success' => [
                    'title' => 'Game created successfully',
                    'description' => 'The game has been created successfully',
                ],
                'error' => [
                    'title' => 'Something went wrong, try again',
                    'description' => 'The game could not be created',
                ],
            ],
        ],
        'delete' => [
            'title' => 'Delete Game',
            'description' => 'Are you sure you want to delete this game?',
            'accept' => 'Yes, delete it',
            'reject' => 'No, cancel',
            'success' => [
                'title' => 'Game deleted successfully',
                'description' => 'The game has been deleted successfully',
            ],
            'error' => [
                'title' => 'Something went wrong',
                'description' => 'Try again',
            ],
        ],
    ],

    'game' => [
        'abort' => 'Game not found',
    ],
];
