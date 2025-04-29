<?php

namespace App\Providers;

use App\Models\User;
use App\Models\ForumThread;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('delete-post',function(User $user , ForumThread $post){
            return $user->id === $post->user_id || $user->role === 'admin';
        });
    }
}
