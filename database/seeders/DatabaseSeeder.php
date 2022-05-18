<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Adv;
use App\Models\Category;
use App\Models\User;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Muhammad Roihan Ainul Yaqin',
            'username' => 'rayhunts',
            'email' => 'rayhunts710@gmail.com',
            'role' => 'developer',
            'email_verified_at' => now(),
            'password' => bcrypt(12345), // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Fathul Arifin',
            'username' => 'pathol',
            'email' => 'patholrahul@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt(12345), // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Sandika Galih',
            'username' => 'wpunpas',
            'email' => 'wpunpas@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt(12345), // password
            'remember_token' => Str::random(10),
        ]);

        // User::factory(10)->create();
        Category::factory(20)->create();
        Article::factory(200)->create();
        // Adv::factory(5)->create();
    }
}