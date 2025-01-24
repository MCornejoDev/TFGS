<?php

return [
    'users' => 'Usuarios',


    'details' => 'Detalles',
    'user' => 'Usuario',

    'avatars' => [
        'example' => 'Avatar de ejemplo',
    ],

    'actions' => [
        'update' => [
            'title' => 'Actualizar Usuario',
            'btn' => 'Actualizar',
            'form' => [
                'name' => 'Nombre',
                'password' => 'Contraseña',
                'email' => 'Email',
                'timezone' => 'Zona horaria',
                'avatar' => 'Avatar',
                'placeholder' => [
                    'password' => 'Contraseña',
                    'email' => 'Email',
                    'name' => 'Nombre de usuario',
                    'timezones' => 'Zonas horarias',
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
        'delete' => [
            'btn' => 'Eliminar',
            'title' => 'Eliminar Usuario',
            'description' => '¿Estás seguro de que quieres eliminar tu usuario?',
            'accept' => 'Sí, eliminarlo',
            'reject' => 'No, cancelar',
            'success' => [
                'title' => 'Usuario eliminado correctamente',
                'description' => 'El usuario ha sido eliminado correctamente',
            ],
            'error' => [
                'title' => 'Algo salió mal, inténtalo de nuevo',
                'description' => 'El usuario no pudo ser eliminado',
            ],
        ],
    ],
];
