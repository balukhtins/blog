<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\Models\User::all();
        factory(\App\Models\Post::class,150)->create()
        ->each(function ($post) use($users){
            $post->user()->associate($users->random());
            $post->save();
        });
    }
}
