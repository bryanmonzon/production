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

        $this->post('projects', [
            'name' => 'United Way San Diego'
        ]);

        $this->assertDatabaseHas('projects', [
            'name' => 'United Way San Diego'
        ]);
    }

    /** @test */
    public function a_project_must_have_a_name()
    {
        $this->signIn();

        $response = $this->post('projects', [
            'name' => ''
        ]);

        $response->assertSessionHasErrors('name');
    }


    /** @test */
    public function a_project_can_be_updated()
    {
        $this->signIn();
        
        $project = create('App\Project');
        
        $this->patch(route('projects.update', $project), [
            'name' => 'Changed',
        ]);

        tap($project->fresh(), function($project) { 
             $this->assertEquals('Changed', $project->name);
        });
    }
}
