<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Category::class, 15)->create();
        $categories = [
            ['title' => 'Industry'],
            ['title' => 'Functionality'],
            ['title' => 'Customer Needs'],
            ['title' => 'Customer Preferences'],
            ['title' => 'Demographics'],
            ['title' => 'Convenience'],
            ['title' => 'Quality'],
            ['title' => 'Performance'],
            ['title' => 'Premiumisation']
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }

}