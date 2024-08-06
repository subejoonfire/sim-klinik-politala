<?php

namespace App\Providers;

use App\Models\Doctors;
use App\Models\Patients;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // No database queries here
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share data with all views
        View::composer('*', function ($view) {
            $view->with('patients', Patients::all());
            $view->with('doctors', Doctors::all());
        });
    }
}
