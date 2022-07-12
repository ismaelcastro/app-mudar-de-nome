<?php

use Illuminate\Database\Seeder;
use App\Models\Guide;

class GuideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guides = json_decode(file_get_contents('https://www.incluirsobrenome.com.br/guides-export'), true);
        foreach($guides as $guide){
            $data = [
                'name' => $guide['name'], 
                'guide_category_id' => $guide['guide_category_id'], 
                'type' => $guide['type'], 
                'file' => $guide['file'], 
                'description' => $guide['description'], 
                'info' => $guide['info']
            ];
            Guide::create($data);
        }
    }
}
