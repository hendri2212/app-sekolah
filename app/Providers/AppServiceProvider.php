<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('welcome', function ($view) {
            $spmbMenuEnabled = true;

            if (Schema::hasTable('site_settings')) {
                $spmbMenuEnabled = SiteSetting::isSpmbMenuEnabled();
            }

            $view->with('spmbMenuEnabled', $spmbMenuEnabled);
        });
    }
}
