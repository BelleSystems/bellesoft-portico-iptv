<?php

namespace Bellesoft\PorticoIptv\Controllers;

use Bellesoft\PorticoIptv\Interface\RoomInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Bellesoft\PorticoIptv\Controllers\Controller;

class RoomController extends Controller
{
    private RoomInterface $roomInterface;

    public function __construct(RoomInterface $roomInterface)
    {
        $this->roomInterface = $roomInterface;
    }

    public function currentReservation(int $roomNumber)
    {
        try {
            $room = $this->roomInterface->getByRoomNumber($roomNumber);

            if (!$room) {
                return $this->notFoundResponse('Room not found');
            }

        $reservation = $this->roomInterface->getCurrentReservation($room);

        return $this->successResponse($reservation, 'Current reservation fetched successfully');
        } catch (Exception $e) {
            Log::error('Failed to get queueRooms: '.$e->getMessage());

            return $this->errorResponse(
                'Failed to get current reservation: ' . $e->getMessage()
            );
        }
    }
}
