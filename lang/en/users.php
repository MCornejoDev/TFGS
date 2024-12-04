<?php

return [
    'details' => 'Details',

    'avatars' => [
        'example' => 'Example Avatar',
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
