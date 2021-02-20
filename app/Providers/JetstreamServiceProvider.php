<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
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
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        // Jetstream::defaultApiTokenPermissions(['read']);
        // TODO: Create a support rep team.

        // TODO: Will become a team role for customer support side.
        // Will be responsible for all support reps.
        Jetstream::role('admin', __('Administrator'), [
            'create',
            'read',
            'update',
            'delete',
            'customer:read',
        ])->description(__('Administrator users can perform any action.'));

        Jetstream::role('support', __('Support Specialist'), [
            'read',
            'create',
            'update',
            'customer:read',
        ])->description(__('Customer support specialist can access customer information'));

        // Customer Roles.
        Jetstream::role('account_owner', __('Account Owner'), [
            'customer:read',
            'customer:update',
        ])->description(__('Account Owners are the primary account holder'));

        Jetstream::role('account_manager', __('Account Manager'), [
            'customer:read',
            'customer:update',
        ])->description(__('Account Managers can manager other account members'));

        Jetstream::role('account_member', __('Account Member'), [
            'customer:read',
            'customer:update',
        ])->description(__('Account Members only have read-only permissions within the team. They can still manage their own profile settings.'));
    }
}
