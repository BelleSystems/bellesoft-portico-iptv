<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route group options (host-controlled)
    |--------------------------------------------------------------------------
    |
    | This package does not enforce any auth/guards. The host application may
    | provide a prefix/middleware/etc by overriding these values.
    |
    */
    'routes' => [
        'prefix' => env('IPTV_ROUTE_PREFIX', 'external-api/iptv'),
        // Example in host app: ['middleware' => ['auth:external-api']]
    ],
    'models' => [
        'reservation' => env('IPTV_RESERVATION_MODEL', Bellesoft\PorticoIptv\Models\Reservation::class),
        'room' => env('IPTV_ROOM_MODEL', Bellesoft\PorticoIptv\Models\Room::class),
    ],
    'eagerloadables' => [
        'reservation' => [
            'profile.profileable',
        ],
        'room' => [
            'reservations.profile.profileable',
        ],
    ],
];
