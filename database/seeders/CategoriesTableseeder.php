<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableseeder extends Seeder
{
    private $category;
    /**
     * Run the database seeds.
     */

     public function __construct(Category $category)
     {
        $this->category = $category;
     }
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Travel',
                'created_at' => Now(),
                'updated_at' =>now(),
            ],
            [
                'name' => 'Music',
                'created_at' => Now(),
                'updated_at' =>now(),
            ],
            [
                'name' => 'Cooking',
                'created_at' => Now(),
                'updated_at' =>now(),
            ],
        ];

        $this->category->insert($categories);
    }
}
