<?php

namespace Tests\Feature\Plans;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddPlanTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_add_a_plan()
    {
        $this->signIn();

        $this->post('plans', [
            'name' => 'Week of June 11 Plan'
        ]);

        $this->assertDatabaseHas('plans', [
            'name' => 'Week of June 11 Plan'
        ]);
    }

    /** @test */
    public function a_plan_must_have_a_name()
    {
        $this->withExceptionHandling()->signIn();

        $response = $this->post('plans', [
            'name' => ''
        ]);

        $response->assertSessionHasErrors('name');
    }
}
