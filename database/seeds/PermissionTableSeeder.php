<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'view_user', 'label' => 'Ver Usuários'],
            ['name' => 'create_user', 'label' => 'Adicionar Usuários'],
            ['name' => 'edit_user', 'label' => 'Editar Usuários'],
            ['name' => 'delete_user', 'label' => 'Excluir Usuários'],
            ['name' => 'dashboard_call', 'label' => 'Dashboard Atendimento'],
            ['name' => 'dashboard_case', 'label' => 'Dashboard Caso'],
            ['name' => 'dashboard_process', 'label' => 'Dashboard Processo']
        ];

        Permission::insert($listArray);
    }
}
