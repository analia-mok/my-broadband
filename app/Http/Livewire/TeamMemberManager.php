<?php

namespace App\Http\Livewire;

use Laravel\Jetstream\Http\Livewire\TeamMemberManager as LivewireTeamMemberManager;
use Laravel\Jetstream\Jetstream;

class TeamMemberManager extends LivewireTeamMemberManager
{
    /**
     * Get the available team member roles.
     *
     * @return array
     */
    public function getRolesProperty()
    {
        // TODO: Will probably switch to permission check if current user
        // can create certain users.
        return [];//array_values(Jetstream::$roles);
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('teams.team-member-manager');
    }
}
