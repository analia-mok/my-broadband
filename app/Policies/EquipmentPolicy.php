<?php

namespace App\Policies;

use App\Models\Equipment;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipmentPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        $currentTeam = $user->currentTeam();

        if ($user->belongsToTeam($currentTeam) && $user->hasTeamRole($currentTeam, 'admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $currentTeam = $user->currentTeam();

        return $user->hasTeamPermission($currentTeam, Equipment::$permissions['read']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\Equipment $equipment
     * @return mixed
     */
    public function view(User $user, Equipment $equipment)
    {
        $currentTeam = $user->currentTeam();

        return $user->hasTeamPermission($currentTeam, Equipment::$permissions['read']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        $currentTeam = $user->currentTeam();

        return $user->hasTeamPermission($currentTeam, Equipment::$permissions['create']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\Equipment $equipment
     * @return mixed
     */
    public function update(User $user, Equipment $equipment)
    {
        $currentTeam = $user->currentTeam();

        return $user->hasTeamPermission($currentTeam, Equipment::$permissions['edit']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\Equipment $equipment
     * @return mixed
     */
    public function delete(User $user, Equipment $equipment)
    {
        $currentTeam = $user->currentTeam();

        return $user->hasTeamPermission($currentTeam, Equipment::$permissions['delete']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\Equipment $equipment
     * @return mixed
     */
    public function restore(User $user, Equipment $equipment)
    {
        $supportTeam = Team::findOrFail(1);
        return $user->belongsToTeam($supportTeam) && $user->hasTeamRole($supportTeam, 'admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\Equipment $equipment
     * @return mixed
     */
    public function forceDelete(User $user, Equipment $equipment)
    {
        $supportTeam = Team::findOrFail(1);
        return $user->belongsToTeam($supportTeam) && $user->hasTeamRole($supportTeam, 'admin');
    }
}
