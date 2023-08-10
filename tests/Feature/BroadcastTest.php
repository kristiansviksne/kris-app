<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class BroadcastTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_access_listening_with_auth(): void
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/listen');
        $response->assertStatus(200);
    }

    public function test_access_listening_without_auth(): void
    {
        $response = $this->get('/listen');
        $response->assertStatus(302);
    }
}
