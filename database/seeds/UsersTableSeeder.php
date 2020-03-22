<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Administrator',
        	'role' => 1,
            'email' => 'admin@carimedis.id',
            'password' => '$2y$12$cUcXDHy.Cqq2bOHvlgPz9OTdnMFB7/0w7hsMSBGBJaFYC18aFD7dy'
        ]);
    }
}
