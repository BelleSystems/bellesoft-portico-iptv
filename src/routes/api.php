<?php

use Carbon\Carbon;
use Bellesoft\PorticoIptv\Models\Room;
use Illuminate\Support\Facades\Route;
use Bellesoft\PorticoIptv\Controllers\RoomController;

Route::prefix('iptv')->group(function () {
    Route::get('/rooms/{room}/current-reservation', [RoomController::class, 'currentReservation'])
        ->name('rooms.current-reservation');
});
