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
//        'App\Models\Admin' => 'App\Policies\AdminPolicy',
//        'App\Models\Doctor' => 'App\Policies\DoctorPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('view-dashboards','App\Policies\AdminPolicy@view');
//        Gate::define('create-doctors','App\Policies\DoctorPolicy@create');

        //
    }
}
