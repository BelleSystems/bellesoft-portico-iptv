<?php

namespace Bellesoft\PorticoIptv\Enums;

enum ReservationState: string
{

    case CONFIRMED = 'CONFIRMED';
    case CHECKED_IN = 'CHECKED_IN';
    case CHECKED_OUT = 'CHECKED_OUT';
    case CANCELLED = 'CANCELLED';
    case PENDING = 'PENDING';
    case EXPIRED = 'EXPIRED';
    case NO_SHOW = 'NO_SHOW';
}