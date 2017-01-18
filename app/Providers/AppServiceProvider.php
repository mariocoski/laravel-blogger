<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
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
                'categories' => Category::getFiveMostPopularOnes(),
                'numberOfCategories' => Category::all()->count(),
            ]);
        });

        Article::created(function ($article) {
            if ($article->is_published === 1 && ($this->published_at < Carbon::now())) {
                $article->searchable();
            } else {
                $article->unsearchable();
            }
        });

        Article::updated(function ($article) {
            if ($article->is_published === 1 && ($article->published_at < Carbon::now())) {
                $article->searchable();
            } else {
                $article->unsearchable();
            }
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
