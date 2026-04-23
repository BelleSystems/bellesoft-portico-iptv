## About
A Laravel package that exposes a small external API for IPTV/Portico integrations, allowing IPTV systems to check service health and retrieve the current reservation for a room, with configurable models and eager-loading.

## Installation

You can install the package via composer:

```bash
composer require bellesoft/portico-iptv
```

The package will automatically register itself.


You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Bellesoft\PorticoIptv\IPTVServiceProvider" --tag="iptv-config"
```
