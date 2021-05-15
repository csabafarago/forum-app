<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadPostTest extends TestCase
{
    private $user = false;

    public function test_add_new_post_in_thread()
    {
        $this->withoutMiddleware();

        $this->user = User::factory()->create();

        $response = $this->actingAs($this->user)->post('/thread-post', [
            'post' => 'Test post',
            'thread_id' => 1,
        ]);

        $this->assertDatabaseHas('thread_posts', [
            'post' => 'Test post'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
