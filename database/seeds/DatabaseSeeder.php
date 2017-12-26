<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         DB::table('msnusers')->insert([
            'name' => 'Modestreet',
            'email' => 'modestreet@gmail.com',
            'password' => bcrypt('mstreet'),
        ]);
    }
}
