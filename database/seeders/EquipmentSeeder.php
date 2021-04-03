<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // @todo swap out for a different team later.
        $supportRepTeam = Team::find(1);

        Equipment::factory()
            ->for($supportRepTeam)
            ->isVoice()
            ->create();

        Equipment::factory()
            ->for($supportRepTeam)
            ->isVideo()
            ->create();

        Equipment::factory()
            ->for($supportRepTeam)
            ->isInternet()
            ->create();

        Equipment::factory()
            ->for($supportRepTeam)
            ->isInternet()
            ->create();
    }
}
