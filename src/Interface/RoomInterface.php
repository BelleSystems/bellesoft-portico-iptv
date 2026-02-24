<?php

namespace Bellesoft\PorticoIptv\Interface;

use Illuminate\Database\Eloquent\Model;

interface RoomInterface
{
    public function getCurrentReservation(Model $room): ?Model;
}