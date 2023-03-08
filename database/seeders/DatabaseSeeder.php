<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\post;
use App\Models\User;
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
        // \App\Models\User::factory(1)->create();
        post::factory(100)->create();
        Category::create([
            'name'         => 'programing',
            'slug'         => 'programing',
        ]);
        Category::create([
            'name'         => 'desain grafis',
            'slug'         => 'desain grafis',
        ]);
        Category::create([
            'name'         => 'web develop',
            'slug'         => 'web develop',
        ]);
        Category::create([
            'name'         => 'web desain',
            'slug'         => 'web desain',
        ]);
        User::create([
            'name'          => 'joni evendi',
            'email'         => 'jonior999@gmail.com',
            'password'      => bcrypt('12345')
        ]);
        User::create([
            'name'          => 'uzumaki',
            'email'         => 'jouzu999@gmail.com',
            'password'      => bcrypt('12345')
        ]);
    }
}
