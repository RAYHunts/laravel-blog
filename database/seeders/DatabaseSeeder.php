<?php

namespace Database\Seeders;

use App\Models\Adv;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $all = Article::all();
        $validated['image'] = 'img/posts/MyPO2AkTFCDpWs3mhB7XZgJPCmvvGJXlujClAHso.jpg';
        foreach ($all as $article) {
            $validated['slug'] = SlugService::createSlug(Article::class, 'slug', $article->title);
            Article::where('id', $article->id)->update($validated);
        }
        // Article::factory(200)->create();
        // Adv::factory(5)->create();
        // $categories = ['News', 'Technology', 'Sport', 'Entertainment', 'Health', 'Science', 'Politics', 'Business', 'Opinion', 'Arts'];
        // foreach ($categories as $category) {
        // Category::create([
        //     'name' => $category,
        //     'slug' => Str::slug($category),
        // ]);
        // }
    }
}