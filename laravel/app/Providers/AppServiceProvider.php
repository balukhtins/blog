<?php

namespace App\Providers;

use App\Models\Post;
use App\Observers\PostObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        View::composer('*', function (\Illuminate\View\View $view){
            $view->with([
                'routes' => [
                    'posts' => route('posts.index'),
                    'adminPosts' => route('admin.posts.index'),
                    'adminPostsCreate' => route('admin.posts.create'),
                    'postByAuthor' => route('home').'/author/'
                ]
            ]);
        });
    }
}
