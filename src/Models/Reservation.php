<?php

namespace Bellesoft\PorticoIptv\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Bellesoft\PorticoIptv\Enums\ReservationState;

class Reservation extends Model
{
    public static function query(): Builder
    {
        return app(config('iptv.models.reservation'))::query();
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(config('iptv.models.room'), 'room_id', 'id');
    }

}