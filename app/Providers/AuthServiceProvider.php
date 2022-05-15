<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Policies\CategoryPolicy;
use http\Env\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
          'App\Models\Category' => 'App\Policies\CategoryPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('read_category',[CategoryPolicy::class,'viewAny']);
        Gate::define('create_category',[CategoryPolicy::class,'create']);
        Gate::define('update_category',[CategoryPolicy::class,'update']);
        Gate::define('delete_category',[CategoryPolicy::class,'delete']);


//        Gate::define('create_category',function (User $user){
//           return $user->role->hasPermission('create_category');
//
//        });




    }
}
