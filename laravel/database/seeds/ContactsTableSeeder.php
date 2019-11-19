<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::get();
        $users->map(function ($user){
            factory(\App\Models\Contact::class)->create([
                'user_id' => $user->id
            ]);
        });

    }
}
