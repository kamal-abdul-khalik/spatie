<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            'Sosial',
            'Politik',
            'Bantuan',
            'Covid19',
            'Pendidikan',
            'ASR',
            'Profil',
            'Kesehatan',
            'Perlombaan',
            'Travel',
            'Bisnis',
            'Sport',
            'Jabatan'
        ]);

        $tags->each(function ($tag) {
            Tags::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        });
    }
}
