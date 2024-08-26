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

    'actions' => [
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
            ]
        ],
    ],
];
