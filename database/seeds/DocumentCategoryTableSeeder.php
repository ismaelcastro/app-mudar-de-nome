<?php

use Illuminate\Database\Seeder;
use App\Models\DocumentCategory;

class DocumentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Procuração', 'forwardingagent' => false, 'package' => false, 'order' => '1'],
            ['name' => 'Breve Relato', 'forwardingagent' => false, 'package' => false, 'order' => '3'],
            ['name' => 'Documentos Pessoais', 'forwardingagent' => false, 'package' => false, 'order' => '2'],            
            ['name' => 'Provas', 'forwardingagent' => false, 'package' => false, 'order' => '4'],
            ['name' => 'Certidões Negativas', 'forwardingagent' => true, 'package' => true, 'order' => '5']
        ];

        DocumentCategory::insert($listArray);
    }
}
