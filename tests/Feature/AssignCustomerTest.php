<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssignCustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function user_can_browse_assign_customer_page()
    {
        $response = $this->get('/assign-customer');

        $response->assertStatus(200);
    }
}
