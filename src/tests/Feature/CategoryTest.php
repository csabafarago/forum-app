<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    private $user = false;

    public function test_new_category_can_be_created()
    {
        $this->withoutMiddleware();

        $this->user = User::factory()->create();

        $response = $this->actingAs($this->user)->post('/categories', [
            'name' => 'Test category',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect();

        $this->assertDatabaseHas('categories', [
            'name' => 'Test category'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
