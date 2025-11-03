<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SimpleRouteTest extends TestCase
{
    /**
     * Test accessing a simple route.
     *
     * @return void
     */
    public function test_simple_route_can_be_accessed()
    {
        $response = $this->get('/test-route');

        $response->assertStatus(200);
        $response->assertSee('Hello Test!');
    }
}
