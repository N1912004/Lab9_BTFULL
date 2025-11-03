<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProtectedRouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test accessing a protected route redirects to login.
     *
     * @return void
     */
    public function test_unauthenticated_user_cannot_access_protected_route()
    {
        $response = $this->get('/articles/create');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
