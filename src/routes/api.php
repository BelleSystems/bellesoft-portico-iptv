<?php

use Carbon\Carbon;
use Bellesoft\PorticoIptv\Models\Room;
use Illuminate\Support\Facades\Route;
use Bellesoft\PorticoIptv\Controllers\RoomController;

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/rooms/{room}/current-reservation', [RoomController::class, 'currentReservation'])
    ->name('rooms.current-reservation');