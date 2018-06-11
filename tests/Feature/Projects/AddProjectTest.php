<?php

namespace Tests\Feature\Projects;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_project()
    {
        $this->signIn();

        $response = $this->post('projects', [
            'name' => 'United Way San Diego'
        ]);

        $response->assertRedirect(route('projects.index'));
        
        $this->assertDatabaseHas('projects', [
            'name' => 'United Way San Diego'
        ]);
    }

    /** @test */
    public function a_project_must_have_a_name()
    {
        $this->withExceptionHandling()->signIn();

        $response = $this->post('projects', [
            'name' => ''
        ]);

        $response->assertSessionHasErrors('name');
    }

}
