<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using view composer to set following variables globally
        view()->composer('*', function($view) {
            $view->with('categories', Category::where('status', 1)->orderBy('id', 'desc')->get());
            $view->with('tags', Tag::where('status', 1)->orderBy('id', 'desc')->get());
            $view->with('popular_news', News::where('display_popular', 1)->where('status', 1)->orderBy('id', 'desc')->get());
            $view->with('trending_news', News::where('display_trending', 1)->where('status', 1)->orderBy('id', 'desc')->get());
            $view->with('breaking_news', News::where('display_breaking', 1)->where('status', 1)->orderBy('id', 'desc')->get());
        });
    }
}
