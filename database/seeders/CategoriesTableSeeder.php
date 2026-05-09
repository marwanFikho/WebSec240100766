<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $names = ['Electronics', 'Books', 'Home'];

        foreach ($names as $name) {
            Category::updateOrCreate(['name' => $name], ['name' => $name]);
        }
    }
}
