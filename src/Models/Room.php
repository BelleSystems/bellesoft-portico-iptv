<?php

namespace Bellesoft\PorticoIptv\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    public static function query(): Builder
    {
        return app(config('iptv.models.room'))::query();
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(config('iptv.models.reservation'), 'room_id', 'id');
    }

}