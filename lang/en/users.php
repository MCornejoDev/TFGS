<?php

return [
    'details' => 'Details',

    'actions' => [
        'update' => [
            'title' => 'Update User',
            'btn' => 'Update',
            'form' => [
                'name' => 'Name',
                'password' => 'Password',
                'email' => 'Email',
                'placeholder' => [
                    'name' => 'Username',
                    'password' => 'Password',
                    'email' => 'Email',
                    'timezone' => 'Timezone',
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
    ],
];
