<?php

return [
    'users' => 'Usuarios',


    'info' => 'Información',
    'user' => 'Usuario',

    'avatars' => [
        'example' => 'Avatar de ejemplo',
    ],

    'empty' => 'No se encontraron usuarios',

    'table' => [
        'name' => 'Nombre',
        'email' => 'Email',
        'email_verified' => 'Email Verificado',
        'email_not_verified' => 'Email No Verificado',
        'timezone' => 'Zona horaria',
        'avatar' => 'Avatar',
        'is_admin' => 'Es administrador',
        'actions' => 'Acciones',
    ],

    'filters' => [
        'title' => 'Filtros',
        'search' => [
            'placeholder' => 'Buscar por nombre, email',
        ],
        'is_admin' => [
            'label' => 'Es administrador',
            'placeholder' => 'Es administrador',
        ],
        'actions' => [
            'loading' => 'Cargando...',
            'clear' => 'Limpiar',
        ],
    ],

    'actions' => [
        'create' => [
            'title' => 'Crear Usuario',
            'btn' => 'Crear',
            'form' => [
                'name' => 'Nombre',
                'password' => 'Contraseña',
                'email' => 'Email',
                'timezone' => 'Zona horaria',
                'avatar' => 'Avatar',
                'verify_email' => 'Verificar Email',
                'placeholder' => [
                    'password' => 'Contraseña',
                    'email' => 'Email',
                    'name' => 'Nombre de usuario',
                    'timezones' => 'Zonas horarias',
                    'avatar' => 'Avatar',
                ],
                'success' => [
                    'title' => 'Usuario creado',
                    'description' => 'El usuario ha sido creado correctamente.',
                ],
                'error' => [
                    'title' => 'Error al crear el usuario',
                    'description' => 'El usuario no ha podido ser creado.',
                ],
            ],
        ],
        'update' => [
            'title' => 'Actualizar Usuario',
            'btn' => 'Actualizar',
            'form' => [
                'name' => 'Nombre',
                'password' => 'Contraseña',
                'email' => 'Email',
                'timezone' => 'Zona horaria',
                'avatar' => 'Avatar',
                'verify_email' => 'Verificar Email',
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
