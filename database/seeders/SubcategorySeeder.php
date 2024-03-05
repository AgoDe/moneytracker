<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::create([
            'category_id' => Category::where('slug', 'auto')->first()->id,
            'title' => 'Carburante',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'auto')->first()->id,
            'title' => 'Manutenzione',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'auto')->first()->id,
            'title' => 'Extra',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'moto')->first()->id,
            'title' => 'Carburante',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'moto')->first()->id,
            'title' => 'Manutenzione',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'moto')->first()->id,
            'title' => 'Extra',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'extra')->first()->id,
            'title' => 'Divertimento',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'extra')->first()->id,
            'title' => 'Cibo',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'extra')->first()->id,
            'title' => 'Vestiti',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'extra')->first()->id,
            'title' => 'Varie',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'casa')->first()->id,
            'title' => 'Utenze',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'casa')->first()->id,
            'title' => 'Mutuo',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'casa')->first()->id,
            'title' => 'Utenze',
        ]);
        Subcategory::create([
            'category_id' => Category::where('slug', 'casa')->first()->id,
            'title' => 'Spesa',
        ]);
    }
}
