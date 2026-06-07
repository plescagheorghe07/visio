<?php

declare(strict_types=1);

return [
    'app_name'     => 'Visio',
    'app_url'      => 'https://visio.page.gd/', // gol = detectare automată din request
    'base_path'    => '', // null = auto | '' = rădăcina domeniului | '/Visio' = subfolder
    'default_lang' => 'ro',
    'languages'    => ['ro', 'en', 'ru'],
    'timezone'     => 'Europe/Chisinau',
    'uploads_path' => __DIR__ . '/../uploads',
    'uploads_url'  => '/uploads',
    'max_upload'   => 5 * 1024 * 1024, // 5 MB
    'allowed_ext'  => ['jpg', 'jpeg', 'png', 'webp', 'gif'],
];
