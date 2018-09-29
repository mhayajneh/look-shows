<?php

namespace App\Providers;

use App\series;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        view()->composer('layouts.app', function($view)
        {
            $series = series::inRandomOrder()->limit(5)->get();
            $view->with('series', $series);
        });
        Route::pattern('seriesID', '[0-9]+');
        Route::pattern('episodeID','[0-9]+');;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
