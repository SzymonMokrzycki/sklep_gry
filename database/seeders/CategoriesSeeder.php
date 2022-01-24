<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories = [
            [
                'name' => 'Sportowe'
            ],
            [
                'name' => 'cRPG'
            ],
            [
                'name' => 'Akcja'
            ],
            [
                'name' => 'Strzelanki'
            ],
            [
                'name' => 'Survival horror'
            ]
        ];
        foreach($categories as $category)
        {
            Category::create([
               'name' => $category['name']
            ]);
        }
    }
}
