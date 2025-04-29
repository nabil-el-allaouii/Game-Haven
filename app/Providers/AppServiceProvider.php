<?php

namespace App\Providers;

use App\Models\User;
use App\Models\ForumThread;
use App\Models\ThreadReply;
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
        Gate::define('delete-reply',function(User $user  , ThreadReply $reply){
            return $user->id === $reply->user->id || $user->role === 'admin';
        });
        Gate::define('user' , function(User $user){
            return $user->role === 'user';
        });
        Gate::define('admin',function(User $user){
            return $user->role === 'admin';
        });
    }
}
