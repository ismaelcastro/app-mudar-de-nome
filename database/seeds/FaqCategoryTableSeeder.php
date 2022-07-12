<?php

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Sobre a Retificação de Registro', 'slug' => 'sobre-a-retificacao-de-registro', 'metatitle' => 'Sobre a Retificação de Registro'],
            ['name' => 'Sobre o Escritório', 'slug' => 'sobre-o-escritorio', 'metatitle' => 'Sobre o Escritório'],
            ['name' => 'Sobre Custos', 'slug' => 'sobre-custos', 'metatitle' => 'Sobre Custos'],
            ['name' => 'Sobre Documentação', 'slug' => 'sobre-documentacao', 'metatitle' => 'Sobre Documentação']
        ];

        FaqCategory::insert($listArray);
    }
}
