<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | This is the prefix for the routes. 
    |
    */
    'routes' => [
        'prefix' => 'external-api/iptv',
    ],

    /*
    |--------------------------------------------------------------------------
    | Middlewares
    |--------------------------------------------------------------------------
    |
    | This is the middleware for the routes. You can include multiple middlewares by passing an array.
    |
    */
    'middlewares' => ['auth:external-api'],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | This is the models that will be overridden by the host application.
    |
    */
    'models' => [
        'reservation' => env('IPTV_RESERVATION_MODEL', Bellesoft\PorticoIptv\Models\Reservation::class),
        'room' => env('IPTV_ROOM_MODEL', Bellesoft\PorticoIptv\Models\Room::class),
    ],

    /*
    |--------------------------------------------------------------------------
    | Eagerloadables
    |--------------------------------------------------------------------------
    |
    | This is the eagerloadables for the models.
    |
    */
    'eagerloadables' => [
        'reservation' => [
            'profile.profileable',
        ],
        'room' => [
            'reservations.profile.profileable',
        ],
    ],
];
