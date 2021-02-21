<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamSeeder extends Seeder
{

    /**
     * This seeder's corresponding model.
     *
     * @var \App\Models\Team
     */
    protected $model = Team::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For dev only. Might move creds to env file.
        $result = User::insert([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'),
            'current_team_id' => 1,
        ]);

        if ($result) {
            // Create Support Rep Team.
            $superAdmin = User::find(1);
            $superAdmin->ownedTeams()->create([
                // 'user_id' => $superAdmin->id,
                'name' => 'Support Representatives',
                'personal_team' => false,
            ]);

            // Attach super admin to support rep team.
            Team::find(1)->users()->attach($superAdmin, [
                'role' => 'admin',
            ]);
        }
    }
}
