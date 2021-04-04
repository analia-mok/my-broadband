<?php

namespace App\Facades;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class TeamPermissions extends Facade
{

    // @todo switch to using proper policies.
    public static function currentUserHasTeamPermission(string $permission): bool
    {
        $currentUser = Auth::user();
        $currentTeam = $currentUser->currentTeam;

        return $currentTeam->userHasPermission($currentUser, $permission);
    }
}
