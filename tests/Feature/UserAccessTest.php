<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cannot_see_admin_link()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
