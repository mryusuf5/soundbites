<?php

namespace App\Providers;

use App\Models\themes;
use Illuminate\Support\ServiceProvider;

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
        view()->composer("components.layouts.layout", function($view){
            $view->with("themes", themes::orderBy("created_at", "DESC")->get());
            $view->with('selectedTheme', themes::where('selected', 1)->first());
        });
    }
}
