<?php

namespace Bellesoft\PorticoIptv\Services;

use Carbon\Carbon;
use Bellesoft\PorticoIptv\Enums\ReservationState;
use Bellesoft\PorticoIptv\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class RoomService
{
    public function getCurrentReservation(Model $room)
    {
        $now = Carbon::now();
        $reservation = $room->reservations()
            ->whereDate('arrival_date', '<=', $now)
            ->whereDate('departure_date', '>', $now)
            ->where('state', ReservationState::CONFIRMED)
            ->with(config('iptv.eagerloadables.reservation'))
            ->first();

        return $reservation;
    }
}