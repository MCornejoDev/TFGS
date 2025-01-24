<?php

return [
    'characters' => 'Personajes',

    'empty' => 'No se encontraron personajes',

    'table' => [
        'level' => 'Nivel',
        'name' => 'Nombre',
        'nickname' => 'Apodo',
        'race' => 'Raza del Personaje',
        'gender' => 'Género',
        'character_type' => 'Tipo de Personaje',
        'armor_weapon' => 'Armadura / Arma',
        'actions' => 'Acciones',
    ],

    'actions' => [
        'history' => 'Historial',
        'information' => 'Información',
        'delete' => 'Borrar',
    ],

    'filters' => [
        'title' => 'Filtros',
        'search' => [
            'placeholder' => 'Buscar por nombre, apodo',
        ],
        'genres' => [
            'select' => 'Seleccione un género',
        ],
        'races' => [
            'select' => 'Seleccione una raza',
        ],
        'characters_types' => [
            'select' => 'Seleccione un tipo de personaje',
        ],
        'actions' => [
            'loading' => 'Cargando...',
            'clear' => 'Limpiar',
        ],
    ],

    'actions' => [
        'history' => [
            'title' => 'Historial',
        ],
        'information' => [
            'title' => 'Información',
        ],
        'create' => [
            'title' => 'Crear Personaje',
            'btn' => 'Crear',
            'form' => [
                'game' => 'Partida',
                'character_type' => 'Tipo de Personaje',
                'race' => 'Raza',
                'gender' => 'Género',
                'age' => 'Edad',
                'name' => 'Nombre',
                'nickname' => 'Apodo',
                'weapon' => 'Arma',
                'shield' => 'Escudo',
                'skill' => 'Habilidad :number',
                'strength' => 'Fuerza',
                'dexterity' => 'Destreza',
                'constitution' => 'Constitución',
                'intelligence' => 'Inteligencia',
                'wisdom' => 'Sabiduría',
                'charisma' => 'Carisma',
                'height' => 'Altura',
                'weight' => 'Peso',
                'health' => 'Salud',
                'level' => 'Nivel',
                'placeholder' => [
                    'character_type' => 'Seleccione un tipo de personaje',
                    'game' => 'Seleccione un juego',
                    'race' => 'Seleccione una raza',
                    'gender' => 'Seleccione un género',
                    'weapon' => 'Seleccione una arma',
                    'age' => 'Ingrese una edad',
                    'name' => 'Ingrese un nombre',
                    'nickname' => 'Ingrese un apodo',
                    'personality' => 'Introduce una personalidad',
                    'skill' => 'Introduce una habilidad',
                    'strength' => 'Ingrese una fuerza',
                    'dexterity' => 'Ingrese una destreza',
                    'constitution' => 'Ingrese una constitución',
                    'intelligence' => 'Ingrese una inteligencia',
                    'wisdom' => 'Ingrese una sabiduría',
                    'charisma' => 'Ingrese una carisma',
                    'height' => 'Ingrese una altura',
                    'weight' => 'Ingrese un peso',
                    'health' => 'Ingrese una salud',
                    'level' => 'Ingrese un nivel',
                ],
                'label' => [
                    'armor' => 'Armadura',
                ],
                'success' => [
                    'title' => 'Personaje creado correctamente',
                    'description' => 'El personaje ha sido creado correctamente',
                ],
                'error' => [
                    'title' => 'Algo salió mal, inténtalo de nuevo',
                    'description' => 'El personaje no pudo ser creado',
                ],
            ],
        ],
        'update' => [
            'btn' => 'Actualizar',
            'title' => 'Actualizar Personaje',
            'form' => [
                'success' => [
                    'title' => 'Personaje actualizado correctamente',
                    'description' => 'El personaje ha sido actualizado correctamente',
                ],
                'error' => [
                    'title' => 'Algo salió mal, inténtalo de nuevo',
                    'description' => 'El personaje no pudo ser actualizado',
                ],
            ],
        ],
        'delete' => [
            'btn' => 'Eliminar',
            'title' => 'Eliminar Personaje',
            'description' => '¿Estás seguro de que quieres eliminar este personaje?',
            'accept' => 'Sí, eliminarlo',
            'reject' => 'No, cancelar',
            'success' => [
                'title' => 'Personaje eliminado correctamente',
                'description' => 'El personaje ha sido eliminado correctamente',
            ],
            'error' => [
                'title' => 'Algo salió mal, inténtalo de nuevo',
                'description' => 'El personaje no pudo ser eliminado',
            ],
        ],
    ],

    'genres' => [
        'image' => 'Imagen de Género',

        'male' => 'Masculino',
        'female' => 'Femenino',
    ],

    'characters_types' => [
        'title' => 'Tipos de Personaje',
        'image' => 'Imagén de Tipo de Personaje',

        'cleric' => 'Clérigo',
        'sorcerer' => 'Hechicero',
        'wizard' => 'Mago',
        'druid' => 'Druida',
        'barbarian' => 'Bárbaro',
        'warrior' => 'Guerrero',
        'paladin' => 'Paladín',
        'ranger' => 'Explorador',
        'bard' => 'Bardo',
        'rogue' => 'Pícaro',
        'monk' => 'Monje',
    ],

    'races' => [
        'image' => 'Imagén de la raza',

        'human' => 'Humano',
        'elf' => 'Elfo',
        'dwarf' => 'Enano',
        'halfling' => 'Mediano',
        'gnome' => 'Gnomo',
        'half_elf' => 'Medio Elfo',
        'half_dwarf' => 'Medio Enano',
        'orc' => 'Orco',
        'semi_orc' => 'Semi Orco',
    ],

    'armors' => [
        'image' => 'Imagén de la armadura',

        'heavy_chain_mail' => 'Armadura de Malla Pesada',
        'leather_armor' => 'Armadura de Cuero Medio o Pesada',
        'cloth_armor' => 'Armadura de Tela',
        'no_armor' => 'Sin armadura',
    ],

    'weapons' => [
        'image' => 'Imagén de la armadura',

        'title' => 'Arma',
        'staff' => 'Bastón',
        'scepter' => 'Cetro',
        'wand' => 'Varita',
        'sword' => 'Espada',
        'axe' => 'Hacha',
        'greatsword' => 'Mandoble',
        'mace' => 'Maza',
        'pickaxe' => 'Pico',
        'double_swords' => 'Espadas Dobles',
        'bow' => 'Arco',
        'crossbow' => 'Ballesta',
        'daggers' => 'Daga',
        'knives' => 'Cuchillas',
    ],

    'character' => [
        'title' => 'Personaje',
        'nickname' => 'Apodo',
        'genre' => 'Género',
        'age' => 'Edad',
        'level' => 'Nivel',
        'height' => 'Altura',
        'weight' => 'Peso',
        'personality' => 'Personalidad',

        'health' => 'Salud',
        'strength' => 'Fuerza',
        'dexterity' => 'Destreza',
        'constitution' => 'Constitución',
        'intelligence' => 'Inteligencia',
        'wisdom' => 'Sabiduría',
        'charisma' => 'Carisma',

        'skills' => 'Habilidades',

        'items' => 'Objetos',

        'abort' => 'Personaje no encontrado',

    ],
];
