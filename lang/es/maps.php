<?php

return [
    'maps' => 'Mapas',

    'empty' => 'No se encontraron mapas',

    'table' => [
        'name' => 'Nombre',
        'link' => 'Enlace',
        'extension' => 'Extensión',
        'actions' => 'Acciones',
    ],

    'actions' => [
        'history' => 'Historial',
        'information' => 'Información',
        'create' => [
            'btn' => 'Crear',
            'form' => [
                'name' => 'Nombre',
                'link' => 'Enlace',
                'extension' => 'Extensión',
                'submit' => 'Crear',
                'success' => [
                    'title' => 'Mapa creado',
                    'description' => 'El mapa ha sido creado exitosamente',
                ],
                'error' => [
                    'title' => 'Error al crear el mapa',
                    'description' => 'Hubo un error al crear el mapa',
                ],
            ],
        ],
        'delete' => [
            'title' => 'Eliminar mapa',
            'description' => '¿Estás seguro de que quieres eliminar este mapa?',
            'accept' => 'Eliminar',
            'reject' => 'Cancelar',
            'success' => [
                'title' => 'Mapa eliminado',
                'description' => 'El mapa ha sido eliminado exitosamente',
            ],
            'error' => [
                'title' => 'Error al eliminar el mapa',
                'description' => 'Hubo un error al eliminar el mapa',
            ],
        ],
    ],

    'filters' => [
        'title' => 'Filtros',
        'search' => [
            'placeholder' => 'Buscar por nombre, enlace',
        ],
        'date_start' => [
            'label' => 'Fecha de inicio',
            'placeholder' => 'Fecha de inicio',
        ],
        'extension' => [
            'select' => 'Seleccione una extensión',
        ],
        'actions' => [
            'loading' => 'Cargando...',
            'clear' => 'Limpiar',
        ],
    ],
];
