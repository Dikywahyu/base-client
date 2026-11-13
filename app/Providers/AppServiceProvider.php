<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use App\Socialite\SsoProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Daftarkan extension driver SSO kustom
        Socialite::extend('sso', function ($app) {
            $config = $app['config']['services.sso'];
            return Socialite::buildProvider(SsoProvider::class, $config);
        });
    }
}
