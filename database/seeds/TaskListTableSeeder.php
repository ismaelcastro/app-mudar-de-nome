<?php

use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Ligar de novo', 'roles' => '4,1'],
            ['name' => 'Pedir documentos', 'roles' => '4'],
            ['name' => 'Verificar o que o cliente decidiu', 'roles' => '4'],
            ['name' => 'Reenviar contrato', 'roles' => '4'],
            ['name' => 'Enviar e-mail', 'roles' => '4'],
            ['name' => 'Enviar WhatsApp', 'roles' => '4'],
            ['name' => 'Conferir documentos', 'roles' => '4'],
            ['name' => 'Protocolar', 'roles' => '4'],
            ['name' => 'Emitir Certidão de Nascimento', 'roles' => '4'],
            ['name' => 'Emitir Certidões Negativas', 'roles' => '4'],
            ['name' => 'Anexar Guias de Custas', 'roles' => '4'],
            ['name' => 'Audiência', 'roles' => '4'],
            ['name' => 'Comunicar Parecer', 'roles' => '4'],
            ['name' => 'Enviar Mandado de Averbação', 'roles' => '4'],
            ['name' => 'Comunicar Sentença', 'roles' => '4']
        ];

        TaskList::insert($listArray);
    }
}
