<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

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
        // if (app()->environment('local') || app()->environment('testing')) {
        //     $this->runSeeder();
        // }
    }
    
    /**
     * Run the database seeder.
     */
    private function runSeeder(): void
    {        
        Artisan::call('db:seed', ['--quiet' => true]);
    }
}
