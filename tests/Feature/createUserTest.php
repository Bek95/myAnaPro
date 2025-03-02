<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class createUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_create_an_user(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Confirm the user was created in the database
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);


        // Attempt to login with the created user's credentials
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Assert the login was successful
        $response->assertStatus(200);

        $this->assertAuthenticated();
    }

}
