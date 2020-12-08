<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Comentario;
use App\Policies\UserPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
         User::class => UserPolicy::class,
         'App\Comentario' => 'App\Policies\PreguntaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('haveaccess', function(User $user, $perm){
           // dd($perm);
           return $user->havePermission($perm);
           //return $perm;
        });

       

    
    }
}
