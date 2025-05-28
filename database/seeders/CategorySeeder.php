<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Technology'
        ]);
        Category::create([
            'name' => 'Sports'
        ]);
        Category::create([
            'name' => 'Fashion'
        ]);
        Category::create([
            'name' => 'Education'
        ]);
        Category::create([
            'name' => 'Entertainment'
        ]);
        Category::create([
            'name' => 'Environment'
        ]);
    }
}
