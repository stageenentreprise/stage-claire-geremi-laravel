<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'name' => 'HTML / CSS',
                'slug' => 'html-css',

            ]
        );
        Category::create(
            [
                'name' => 'Javascript',
                'slug' => 'javascript',
                
            ]
        );
        Category::create(
            [
                'name' => 'PHP',
                'slug' => 'php',
                
            ]
        );
        Category::create(
            [
                'name' => 'C',
                'slug' => 'c',
                
            ]
        );
        Category::create(
            [
                'name' => 'C++',
                'slug' => 'cpp',
                
            ]
        );
        Category::create(
            [
                'name' => 'Ruby',
                'slug' => 'ruby',
                
            ]
        );
    }
}
