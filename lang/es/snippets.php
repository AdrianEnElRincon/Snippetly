<?php

return [
    'search' => 'Buscar snippets ...',
    'welcome' => "#!/usr/bin/env bash\nwhile curiosidad > 0; do\n   echo programacion\n   echo comunidades\n   echo snippets\ndone",
    'popular' => 'Snippets mas populares',
    'create' => 'Crear Nueva Snippet',
    'show' => 'Ver tus snippets',
    'discover' => 'Descubrir nuevas snippets',
    'your-snippets' => 'Tus Snippets',
    'create-form' => [
        'title' => 'Título',
        'description' => 'Descripción',
        'select-lang' => 'Selecciona el lenguaje de la Snippet',
        'no-community' => 'No publicar a una comunidad'
    ],
    'editor' => 'Editor de Snippets',
    'edit' => 'Editar',
    'delete' => 'Eliminar',
    'messages' => [
        'deleted' => 'Se ha eliminado correctamente la snippet :snippet.',
        'created' => 'Se ha creado correctamente la snippet :snippet.',
        'updated' => 'Se ha actualizado correctamente la snippet :snippet.',
    ],
    'create-card' => [
        'title' => 'Crea una nueva Snippet!',
        'description' => 'Usa nuestro editor para crear nuevas snippets en tu lenguaje de programación favorito.'
    ],
    'validation' => [
        'required-title' => ['attribute' => 'título'],
        'required-language' => ['attribute' => 'lenguaje'],
        'required-content' => 'El contenido de la Snippet no puede estar vacío.'
    ]
];
