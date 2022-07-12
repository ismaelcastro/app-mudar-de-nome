<?php

use Illuminate\Database\Seeder;
use App\Models\Reason;

class ReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Abando Familiar', 'color' => '#203864'],
            ['name' => 'Adoção', 'color' => '#deebf7'],
            ['name' => 'Casamento', 'color' => '#2f5597'],
            ['name' => 'Cidadania', 'color' => '#843c0b'],
            ['name' => 'Constrangimento', 'color' => '#a9d18e'],
            ['name' => 'Divórcio', 'color' => '#b4c7e7'],
            ['name' => 'Grafia', 'color' => '#70ad47'],
            ['name' => 'Homenagem Familiar', 'color' => '#385724'],
            ['name' => 'Homônimos', 'color' => '#e2f0d9'],
            ['name' => 'Maioridade', 'color' => '#c5e0b4'],
            ['name' => 'Pronúncia', 'color' => '#bf9000'],
            ['name' => 'Uso Prolongado', 'color' => '#fff2cc'],
            ['name' => 'Outros', 'color' => '#bfbfbf'],
        ];

        Reason::insert($listArray);
    }
}
