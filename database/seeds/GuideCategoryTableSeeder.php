<?php

use Illuminate\Database\Seeder;
use App\Models\GuideCategory;

class GuideCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Guias Judiciais', 'forwardingagent' => false, 'package' => false],
            ['name' => 'Justiça Gratuita', 'forwardingagent' => false, 'package' => false]
        ];

        GuideCategory::insert($listArray);
    }
}
