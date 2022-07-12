<?php

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Notícias', 'slug' => 'noticias', 'metatitle' => 'Notícias'],
            ['name' => 'Artigos', 'slug' => 'artigos', 'metatitle' => 'Artigos']
        ];

        NewsCategory::insert($listArray);
    }
}
