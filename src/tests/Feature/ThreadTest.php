<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    public function test_new_category_can_be_created()
    {
        $this->withoutMiddleware();

        $user = new User();
        $user->email = 'faragoc@hotmail.com';
        $user->password = 'test';
        $user->name = 'Csaba farago';
        $user->save();

        $response = $this->actingAs($user)->post('/categories', [
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
