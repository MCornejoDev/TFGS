<?php

return [
    'users' => 'Users',

    'info' => 'Information',
    'user' => 'User',

    'avatars' => [
        'example' => 'Example Avatar',
    ],

    'empty' => 'No users found',

    'table' => [
        'name' => 'Name',
        'email' => 'Email',
        'email_verified' => 'Email Verified',
        'email_not_verified' => 'Email Not Verified',
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
        'create' => [
            'title' => 'Create User',
            'btn' => 'Create',
            'form' => [
                'name' => 'Name',
                'email' => 'Email',
                'timezone' => 'Timezone',
                'avatar' => 'Avatar',
                'placeholder' => [
                    'name' => 'Username',
                    'email' => 'Email',
                    'timezones' => 'Timezones',
                    'avatar' => 'Avatar',
                    'password' => 'Password',
                    'password_confirmation' => 'Password Confirmation',
                    'verify_email' => 'Verify Email',
                    'verify_email_message' => 'Verify Email Message',
                ],
                'success' => [
                    'title' => 'User created',
                    'description' => 'The user has been created successfully.',
                ],
                'error' => [
                    'title' => 'Error creating user',
                    'description' => 'The user could not be created.',
                ],
            ],
        ],
        'update' => [
            'title' => 'Update User',
            'btn' => 'Update',
            'form' => [
                'name' => 'Name',
                'password' => 'Password',
                'email' => 'Email',
                'timezone' => 'Timezone',
                'avatar' => 'Avatar',
                'verify_email' => 'Verify Email',
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
