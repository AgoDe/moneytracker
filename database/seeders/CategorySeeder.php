<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Moto',
            'color' => '#ffffff',
        ]);
        Category::create([
            'title' => 'Auto',
            'color' => '#ffffff',
        ]);
        Category::create([
            'title' => 'Casa',
            'color' => '#ffffff',
        ]);
        Category::create([
            'title' => 'Bimbi',
            'color' => '#ffffff',
        ]);
        Category::create([
            'title' => 'Salute',
            'color' => '#ffffff',
        ]);
        Category::create([
            'title' => 'Extra',
            'color' => '#ffffff',
        ]);
    }
}
