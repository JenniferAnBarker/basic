<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Miley',
            'email' => 'test@email.com',
            'username' => 'test',
            'profile_image' => '202303221735Miley-Cyrus.jpg',
            'password' => bcrypt('password'),
        ]);

        \App\Models\HomeSlide::factory()->create([
            'title' => 'Testing',
            'short_title' => "Testing Let's Go 1, 2, 3",
            'home_slide' => 'upload/home_slide/1761711064569119.png',
            'video_url' => 'https://youtu.be/XHOmBV4js_E'
        ]);

        \App\Models\About::factory()->create([
            'title' => 'Testing',
            'short_title' => "Testing, testing, 1, 2, 3",
            'short_description' => "We came, we tested, we conquered!",
            'long_description' => 'Yaaaaaaaaayyyyyyyyyyyyyyyyyyyyyyyyy',
            'about_image' => ''
        ]);
    }
}
