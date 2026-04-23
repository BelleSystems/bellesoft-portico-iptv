<?php

namespace Bellesoft\PorticoIptv\Repositories;

use Bellesoft\PorticoIptv\Interface\RoomInterface;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Bellesoft\PorticoIptv\Enums\ReservationState;
use Bellesoft\PorticoIptv\Models\Room;
class RoomRepository implements RoomInterface
{
    /**
     * Get the current reservation for a room.
     *
     * @param Model $room
     * @return Model|null
     */
    public function getCurrentReservation(Model $room): ?Model
    {
        $now = Carbon::now();

        return $room->reservations()
            ->whereDate('arrival_date', '<=', $now)
            ->whereDate('departure_date', '>=', $now)
            ->where('state', ReservationState::CHECKED_IN)
            ->with(config('iptv.eagerloadables.reservation'))
            ->first();
    }

    /**
     * Get a room by its ID.
     *
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model
    {
        return Room::query()->findOrFail($id);
    }

    /**
     * Get a room by its room number.
     *
     * @param string $roomNumber
     * @return Model|null
     */
    public function getByRoomNumber(string $roomNumber): ?Model
    {
        return Room::query()->where('room_number', $roomNumber)->first();
    }
}