<?php

return [
    'details' => 'Detalles',

    'actions' => [
        'update' => [
            'title' => 'Actualizar Usuario',
            'btn' => 'Actualizar',
            'form' => [
                'name' => 'Nombre',
                'password' => 'Contraseña',
                'email' => 'Email',
                'placeholder' => [
                    'password' => 'Contraseña',
                    'email' => 'Email',
                    'name' => 'Nombre de usuario',
                    'timezone' => 'Zona horaria',
                    'avatar' => 'Avatar',
                ],
                'success' => [
                    'title' => 'Usuario actualizado',
                    'description' => 'El usuario ha sido actualizado correctamente.',
                ],
                'error' => [
                    'title' => 'Error al actualizar el usuario',
                    'description' => 'El usuario no ha podido ser actualizado.',
                ],
            ],
        ],
    ],
];
