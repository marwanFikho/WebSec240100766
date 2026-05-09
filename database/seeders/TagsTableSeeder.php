<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $names = ['New', 'Sale', 'Popular'];

        foreach ($names as $name) {
            Tag::updateOrCreate(['name' => $name], ['name' => $name]);
        }
    }
}
