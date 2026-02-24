<?php

namespace Bellesoft\PorticoIptv\Controllers;

use Bellesoft\PorticoIptv\Enums\ReservationState;
use Bellesoft\PorticoIptv\Models\Room;
use Bellesoft\PorticoIptv\Interface\RoomInterface;
use Carbon\Carbon;
use Illuminate\Http\Response;
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

    public function currentReservation(int $room)
    {
        try {
            
        $room = Room::query()->findOrFail($room);

        $reservation = $this->roomInterface->getCurrentReservation($room);

        return $this->successResponse($reservation, 'Current reservation fetched successfully');
        } catch (Exception $e) {
            Log::error('Failed to get queueRooms: '.$e->getMessage());

            return $this->errorResponse(
                'Failed to get current reservation: '.$e->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
