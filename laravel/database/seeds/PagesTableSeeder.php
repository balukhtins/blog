<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Page::class)->create([
            'name' => 'Home'
        ]);
        factory(\App\Models\Page::class)->create([
            'name' => 'Contacts'
        ]);
        factory(\App\Models\Page::class)->create([
            'name' => 'About us'
        ]);
    }
}
