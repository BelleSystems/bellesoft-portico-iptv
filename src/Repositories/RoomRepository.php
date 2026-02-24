<?php

namespace Bellesoft\PorticoIptv\Repositories;

use Bellesoft\PorticoIptv\Interface\RoomInterface;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Bellesoft\PorticoIptv\Enums\ReservationState;
class RoomRepository implements RoomInterface
{
    public function getCurrentReservation(Model $room): ?Model
    {
        $now = Carbon::now();

        return $room->reservations()
            ->whereDate('arrival_date', '<=', $now)
            ->whereDate('departure_date', '>', $now)
            ->where('state', ReservationState::CONFIRMED)
            ->with(config('iptv.eagerloadables.reservation'))
            ->first();
    }
}