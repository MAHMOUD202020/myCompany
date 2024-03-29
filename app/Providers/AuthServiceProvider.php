<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->checkHaveRole();

        $this->registerPolicies();
    }


    private function checkHaveRole(){
        Gate::define('role', function ($user , $role) {
            return true;

            if ($user->role_id && $user->role) {

                $permissions = $user->role->permissions->map->name->all();

            }else{

                return  false;
            }

            return  in_array($role , $permissions);

        });
    }
}
