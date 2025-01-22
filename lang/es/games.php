<?php

return [
    'games' => 'Partidas',

    'empty' => 'No se encontraron partidas',

    'table' => [
        'name' => 'Nombre',
        'description' => 'Descripción',
        'date_start' => 'Fecha de inicio',
        'comments' => 'Comentarios',
        'users' => 'Jugadores en la partida',
        'actions' => 'Acciones',
    ],

    'filters' => [
        'title' => 'Filtros',
        'search' => [
            'placeholder' => 'Buscar por nombre, comentarios',
        ],
        'date_start' => [
            'label' => 'Fecha de inicio',
            'placeholder' => 'Fecha de inicio',
        ],
        'actions' => [
            'loading' => 'Cargando...',
            'clear' => 'Limpiar',
        ],
    ],

    'actions' => [
        'create' => [
            'title' => 'Crear Partida',
            'btn' => 'Crear',
            'form' => [
                'name' => 'Nombre',
                'date_start' => 'Fecha de inicio',
                'comments' => 'Comentarios',
                'users' => 'Usuarios',
                'placeholder' => [
                    'name' => 'Ingrese un nombre',
                    'date_start' => 'Ingrese una fecha',
                    'comments' => 'Ingrese un comentario',
                    'users' => 'Seleccione uno o más usuarios',
                ],
                'label' => [
                    'comments' => 'Comentarios',
                    'date_start' => 'Fecha de inicio',
                ],
                'success' => [
                    'title' => 'Partida creada correctamente',
                    'description' => 'La partida ha sido creada correctamente',
                ],
                'error' => [
                    'title' => 'Algo salió mal, inténtalo de nuevo',
                    'description' => 'La partida no pudo ser creada',
                ],
            ],
        ],
        'delete' => [
            'title' => 'Eliminar Partida',
            'description' => '¿Estás seguro de que quieres eliminar esta partida?',
            'accept' => 'Sí, eliminarla',
            'reject' => 'No, cancelar',
            'success' => [
                'title' => 'Partida eliminada correctamente',
                'description' => 'La partida ha sido eliminada correctamente',
            ],
            'error' => [
                'title' => 'Algo salió mal',
                'description' => 'Inténtalo de nuevo',
            ],
        ],
    ],

    'game' => [
        'abort' => 'Partida no encontrada',
    ],
];
