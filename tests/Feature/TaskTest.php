<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_task()
    {
        $user = User::factory()->create();
        $token = $user->createToken('auth_token', ['*'])->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->json('get', '/api/tasks', []);
        $response->assertStatus(200);
    }

    public function test_store_task()
    {
        $user = User::factory()->create();
        $token = $user->createToken('auth_token', ['*'])->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->json('post', '/api/tasks', [
            'name' => 'Test task',
            'status' => 'completed',
            'description' => 'Lorem ipsum lorem'
        ]);
        $response->assertStatus(200);
    }
}
