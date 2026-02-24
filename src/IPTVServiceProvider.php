<?php

namespace Bellesoft\PorticoIptv;

use Illuminate\Support\ServiceProvider;
use Bellesoft\PorticoIptv\Interface\RoomInterface;
use Bellesoft\PorticoIptv\Repositories\RoomRepository;
class IPTVServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'iptv');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        # Publish the config file
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('iptv.php'),
            ], 'iptv-config');
        }
        
        # Load the routes
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        # Bind the room interface to the room repository
        $this->app->bind(RoomInterface::class, RoomRepository::class);
    }
}
