<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\Admin\UsuarioInterface', 'App\Repositories\Admin\UsuarioRepository');
        $this->app->bind('App\Repositories\Interfaces\Admin\LevelInterface', 'App\Repositories\Admin\LevelRepository');
        $this->app->bind('App\Repositories\Interfaces\Admin\SectorInterface', 'App\Repositories\Admin\SectorRepository');
        $this->app->bind('App\Repositories\Interfaces\Admin\LogInterface', 'App\Repositories\Admin\LogRepository');
    }
}
