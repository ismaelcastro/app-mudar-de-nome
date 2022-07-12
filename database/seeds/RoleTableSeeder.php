<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'developer', 'label' => 'Desenvolvedor'],
            ['name' => 'commercial', 'label' => 'Comercial'],
            ['name' => 'screening', 'label' => 'Triagem'],
            ['name' => 'lawyer', 'label' => 'Advogado'],
            ['name' => 'administrative', 'label' => 'Administrativo'],
            ['name' => 'marketing', 'label' => 'Marketing']
        ];

        Role::insert($listArray);
    }
}
