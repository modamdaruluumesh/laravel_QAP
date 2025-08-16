<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (isset($_SERVER['CODESPACE_NAME'])) {
            $host = $_SERVER['CODESPACE_NAME'] . '-8000.app.github.dev';
            URL::forceRootUrl("https://{$host}");
            URL::forceScheme('https');
        } else {
            URL::forceRootUrl(config('app.url'));
            if ($this->app->environment('local')) {
                URL::forceScheme('https');
            }
        }
    }
}
