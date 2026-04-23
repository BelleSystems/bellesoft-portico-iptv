## About
A Laravel package that exposes a small external API for IPTV/Portico integrations, allowing IPTV systems to check service health and retrieve the current reservation for a room, with configurable models and eager-loading.

## Installation

**1. Install the package via composer**

```bash
composer require bellesoft/portico-iptv
```

The package will automatically register itself.


**2. Publish the config-file with:**

```bash
php artisan vendor:publish --provider="Bellesoft\PorticoIptv\IPTVServiceProvider" --tag="iptv-config"
```

**3. Environment setup**

Set these in `.env`:

```
# Override the Reservation model used by the package
IPTV_RESERVATION_MODEL=App\Models\Core\Reservations\Reservation
# Override the Room model used by the package
IPTV_ROOM_MODEL=App\Models\Core\Room\Room
```
4) Verify endpoints
Once installed, these routes are available:
```
GET /external-api/iptv/health
```


## Example Usage

For example: Getting the current reservation details from room number **`503`** (_room_number_ from `rooms` table).

Assuming the Portico Backend runs on localhost:8010
```
GET http://localhost:8010/external-api/iptv/rooms/503/current-reservation
```

Expected Output:
```
{
  "status": "success",
  "message": "Current reservation fetched successfully",
  "data": {...}
}
```
