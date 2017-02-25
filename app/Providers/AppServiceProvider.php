<?php

namespace App\Providers;

use App\Models\Category;
use Cache;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\Console\FlushCommand;
use Laravel\Scout\Console\ImportCommand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials._nav_categories', function ($view) {
            $view->with([
                'categories' => Cache::remember('top-five-categories', 600, function () {
                    return Category::getFiveMostPopularOnes();
                }),
                'numberOfCategories' => Cache::remember('number-of-categories', 600, function () {
                    return Category::all()->count();
                }),

            ]);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('blogger.search_engine.enabled')) {
            $this->commands([
                ImportCommand::class,
                FlushCommand::class,
            ]);

        }

    }
}
