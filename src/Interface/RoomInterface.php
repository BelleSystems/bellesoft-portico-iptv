<?php

namespace Bellesoft\PorticoIptv\Interface;

use Illuminate\Database\Eloquent\Model;

interface RoomInterface
{
    /**
     * Get a room by its ID.
     *
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model;

    /**
     * Get a room by its room number.
     *
     * @param string $roomNumber
     * @return Model|null
     */
    public function getByRoomNumber(string $roomNumber): ?Model;

    /**
     * Get the current reservation for a room.
     *
     * @param Model $room
     * @return Model|null
     */
    public function getCurrentReservation(Model $room): ?Model;
}