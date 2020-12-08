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
        $this->registerPolicies();

        $policies = \App\Models\User::POLICIES;
        foreach ($policies as $module => $actions) {
            foreach ($actions as $action) {
                Gate::define($module . '.' . $action, function ($user) use ($module, $action) {
                    return $user->hasAccess($module . '.' . $action);
                });
            }
        }
    }
}
