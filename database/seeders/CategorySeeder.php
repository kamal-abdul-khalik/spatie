<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Gadget',
            'Lifestyle',
            'Fashion',
        ]);

        $categories->each(function ($category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        });
    }
}
