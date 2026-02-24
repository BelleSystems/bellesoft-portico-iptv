<?php

return [
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
