<?php

namespace App\Providers;

use App\Models\Equipment;
use App\Models\Team;
use App\Models\User;
use App\Policies\EquipmentPolicy;
use App\Policies\TeamPolicy;
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
        Team::class => TeamPolicy::class,
        Equipment::class => EquipmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('support-team', function (User $user, Team $team) {
            return $user->hasTeamPermission($team, 'support');
        });
    }
}
