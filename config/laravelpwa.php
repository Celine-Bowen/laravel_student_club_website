<?php

return [
  'name' => env('APP_NAME', 'CopaTechClub'),
  'manifest' => [
    'name' => env('APP_NAME', 'CopaTechClub'),
    'short_name' => env('APP_NICK', 'CopaTechClub'),
    'description' => 'A community of techies utilizing technologies',

    'description' => 'A community of techies utilizing æternity technologies',

    'start_url' => '/',
    'background_color' => '#ffffff',
    'theme_color' => '#f7296e',
    'display' => 'standalone',
    'orientation'=> 'portrait',
    'lang' => 'en-US',
    'icons' => [
      '48x48' => '/assets/images/icons/icon-48x48.png',
      '72x72' => '/assets/images/icons/icon-72x72.png',
      '96x96' => '/assets/images/icons/icon-96x96.png',
      '128x128' => '/assets/images/icons/icon-128x128.png',
      '144x144' => '/assets/images/icons/icon-144x144.png',
      '152x152' => '/assets/images/icons/icon-152x152.png',
      '192x192' => '/assets/images/icons/icon-192x192.png',
      '384x384' => '/assets/images/icons/icon-384x384.png',
      '512x512' => '/assets/images/icons/icon-512x512.png'
    ],
    'splash' => [
      '640x1136' => '/assets/images/icons/splash-640x1136.png',
      '750x1334' => '/assets/images/icons/splash-750x1334.png',
      '828x1792' => '/assets/images/icons/splash-828x1792.png',
      '1125x2436' => '/assets/images/icons/splash-1125x2436.png',
      '1242x2208' => '/assets/images/icons/splash-1242x2208.png',
      '1242x2688' => '/assets/images/icons/splash-1242x2688.png',
      '1536x2048' => '/assets/images/icons/splash-1536x2048.png',
      '1668x2224' => '/assets/images/icons/splash-1668x2224.png',
      '1668x2388' => '/assets/images/icons/splash-1668x2388.png',
      '2048x2732' => '/assets/images/icons/splash-2048x2732.png',
    ],
    'custom' => [

      'tag' => 'jeremihza',

      'tag' => 'jeremhza',

      'tag1' => 'CopaTech',
      'tag2' => 'cuk',
      'tag3' => 'CopaTechClub',
    ]
  ]
];
