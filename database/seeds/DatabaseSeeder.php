<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        
        factory(App\User::class, 1)->create([
            'name' => 'Bryan Monzon',
            'email' => 'bryanm@fiftyandfifty.org',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        ]);
    }
}
