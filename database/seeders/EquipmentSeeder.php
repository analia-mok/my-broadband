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
            ->count(15)
            ->for($supportRepTeam)
            ->isVoice()
            ->create();

        Equipment::factory()
            ->count(15)
            ->for($supportRepTeam)
            ->isVideo()
            ->create();

        Equipment::factory()
            ->count(20)
            ->for($supportRepTeam)
            ->isInternet()
            ->create();
    }
}
