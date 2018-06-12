<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    protected $projects = [
        'Inwood Academy',
        'Kivu Security',
        'United Way San Diego',
        'UWW - Campaign & Content',
        'UWW - Beyond Your Control',
        'PSI'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();

        foreach($this->projects as $project) {
            factory(App\Project::class)->create([
                'name' => $project
            ]);
        }
    }
}
