<?php
return [
    'languages' => true,
    'panel' => [
        'install' => true
    ],
    'url' => $_SERVER['SERVER_NAME'] === 'localhost' ? 'http://localhost:8080' : 'https://rosa.shift-wise.de',
    'routes' => [
        [
            'pattern' => '/',
            'action' => function () {
                return site()->visit('home');
            }
        ]
    ],
    'thumbs' => [
        'format' => 'webp', // Standard-Format für alle Thumbnails
        'quality' => 85,
        'presets' => [
            'default' => ['width' => 1024, 'quality' => 80],
            'blurred' => ['blur' => true],
            'hero' => ['width' => 1600, 'height' => 900, 'crop' => true], // Preset für Hero-Images
        ]
    ],
    'hooks' => [
        'file.create:after' => function ($file) {
            // Automatische WebP-Generierung bei Upload
            if ($file->type() === 'image') {
                $file->thumb(['format' => 'webp']);
            }
        }
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
        ],
    'thathoff.git-content.commit' => true,
];