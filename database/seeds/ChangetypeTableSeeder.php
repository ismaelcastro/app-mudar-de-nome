<?php

use Illuminate\Database\Seeder;
use App\Models\Changetype;

class ChangetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Nome'],
            ['name' => 'Sobrenome'],
            ['name' => 'Sobrenome Materno'],
            ['name' => 'Sobrenome Paterno'],
            ['name' => 'Sobrenome Avoengo'],
            ['name' => 'Sobrenome Socioafetivo'],
            ['name' => 'Apelido'],
            ['name' => 'Gênero'],
            ['name' => 'Outros'],
        ];

        Changetype::insert($listArray);
    }
}
