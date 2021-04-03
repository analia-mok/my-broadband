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
        // @todo Will consider overriding/redefining default routes
        // so that i can control this particular page later.
        // @see https://github.com/laravel/jetstream/pull/67
        return array_values(Jetstream::$roles);
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
