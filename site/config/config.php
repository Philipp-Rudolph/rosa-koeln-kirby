<?php
return [
    'debug' => true,
    'panel' => [
        'install' => true
    ],
    'languages' => false, // Später auf true für Mehrsprachigkeit
    'routes' => [
        [
            'pattern' => '/',
            'action' => function () {
                return site()->visit('home');
            }
        ]
    ],
    'thumbs' => [
        'quality' => 80,
        'presets' => [
            'gallery' => ['width' => 800, 'height' => 600, 'crop' => true],
            'card' => ['width' => 400, 'height' => 300, 'crop' => true],
            'hero' => ['width' => 1200, 'height' => 600, 'crop' => true]
        ]
    ],
    'kirby3-webp' => true,
    'email' => [
        'transport' => [
            'type' => 'smtp',
            'host' => 'smtp.ihreranbieter.com',
            'port' => 465,
            'security' => true,
            'auth' => true,
            'username' => 'ihr-smtp-username',
            'password' => 'ihr-smtp-passwort'
        ]
    ]
];