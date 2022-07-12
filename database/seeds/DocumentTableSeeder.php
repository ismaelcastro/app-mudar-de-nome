<?php

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documents = json_decode(file_get_contents('https://www.incluirsobrenome.com.br/documents-export'), true);
        foreach($documents as $document){
            $data = [
                'name' => $document['name'], 
                'document_category_id' => $document['document_category_id'], 
                'type' => $document['type'], 
                'file' => $document['file'], 
                'description' => $document['description'], 
                'info' => $document['info']
            ];
            Document::create($data);
        }
    }
}
