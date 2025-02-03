<?php

return [
    'users' => 'Users',

    'details' => 'Details',
    'user' => 'User',

    'avatars' => [
        'example' => 'Example Avatar',
    ],

    'empty' => 'No users found',

    'table' => [
        'name' => 'Name',
        'email' => 'Email',
        'email_verified' => 'Email Verified',
        'timezone' => 'Timezone',
        'avatar' => 'Avatar',
        'is_admin' => 'Is Admin',
        'actions' => 'Actions',
    ],

    'filters' => [
        'title' => 'Filters',
        'search' => [
            'placeholder' => 'Search by name, email',
        ],
        'is_admin' => [
            'label' => 'Is Admin',
            'placeholder' => 'Is Admin',
        ],
        'actions' => [
            'loading' => 'Loading...',
            'clear' => 'Clear',
        ],
    ],

    'actions' => [
        'update' => [
            'title' => 'Update User',
            'btn' => 'Update',
            'form' => [
                'name' => 'Name',
                'password' => 'Password',
                'email' => 'Email',
                'timezone' => 'Timezone',
                'avatar' => 'Avatar',
                'placeholder' => [
                    'name' => 'Username',
                    'password' => 'Password',
                    'email' => 'Email',
                    'timezones' => 'Timezones',
                    'avatar' => 'Avatar',
                ],
                'success' => [
                    'title' => 'User updated',
                    'description' => 'The user has been updated successfully.',
                ],
                'error' => [
                    'title' => 'Error updating user',
                    'description' => 'The user could not be updated.',
                ],
            ],
        ],
        'delete' => [
            'btn' => 'Delete',
            'title' => 'Delete User',
            'description' => 'Are you sure you want to delete your user?',
            'accept' => 'Yes, delete it',
            'reject' => 'No, cancel',
            'success' => [
                'title' => 'User deleted successfully',
                'description' => 'The user has been deleted successfully',
            ],
            'error' => [
                'title' => 'Something went wrong, try again',
                'description' => 'The user could not be deleted',
            ],
        ],
    ],
];
