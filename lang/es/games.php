<?php

return [
    'games' => 'Partidas',

    'empty' => 'Sin partidas encontradas',

    'table' => [
        'name' => 'Nombre',
        'date_start' => 'Fecha de inicio',
        'comments' => 'Comentarios',
        'users' => 'Jugadores en la partida',
        'actions' => 'Acciones',
    ],

    'filters' => [
        'title' => 'Filtros',

        'actions' => [
            'loading' => 'Cargando...',
            'clear' => 'Limpiar',
        ],
    ],

    'actions' => [
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
            ]
        ],
    ],
];
