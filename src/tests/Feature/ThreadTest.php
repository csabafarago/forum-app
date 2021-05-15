<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    private $user = false;

    public function test_new_thread_can_be_created()
    {
        $this->withoutMiddleware();

        $this->user = User::factory()->create();

        $response = $this->actingAs($this->user)->post('/threads', [
            'title' => 'Test thread',
            'category_id' => 1,
        ]);

        $this->assertDatabaseHas('threads', [
            'title' => 'Test thread'
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticated();


    }
}
