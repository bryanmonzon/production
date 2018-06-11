<?php

namespace Tests\Feature\Projects;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
    
        $this->withExceptionHandling();
    
        $this->signIn();
    }

    /** @test */
    public function a_project_can_be_updated()
    {
        
        $project = create('App\Project');
        
        $this->patch(route('projects.update', $project), [
            'name' => 'Changed',
        ]);

        tap($project->fresh(), function($project) { 
             $this->assertEquals('Changed', $project->name);
        });
    }
}
