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
        factory(\App\Models\User::class)->create([
            'email' => 'test@test.com',
            'password' => bcrypt('123456789'),
            'role' => 'admin'
        ]);
        factory(\App\Models\User::class,25)->create();
    }
}
