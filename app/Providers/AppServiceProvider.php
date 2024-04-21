<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        $bundles = glob(app_path('Bundles/*/*ServiceProvider.php'));

        foreach ($bundles as $bundle) {
            $provider = Str::substr($bundle, stripos($bundle, '/app/bundle'), -4);
            $providers[] = Str::replace('/', '\\', $provider).'::class';
        }
    }
}
