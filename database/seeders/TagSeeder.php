<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags =['Nature','Sports','Technology','AI','Politics','Fashion','Entertainment'];

        foreach ($tags as $tag){
            Tag::create([
                'name' => $tag
            ]);
        }
    }
}
