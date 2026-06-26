<?php

namespace App\Providers;

use App\Models\SiteSetting;
use App\Models\SchoolProfile;
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
            $footerAccreditation = null;

            if (Schema::hasTable('site_settings')) {
                $spmbMenuEnabled = SiteSetting::isSpmbMenuEnabled();
            }

            if (Schema::hasTable('school_profiles')) {
                $footerAccreditation = SchoolProfile::query()->value('accreditation');
            }

            $view->with([
                'spmbMenuEnabled' => $spmbMenuEnabled,
                'footerAccreditation' => $footerAccreditation,
            ]);
        });
    }
}
