<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ChangetypeTableSeeder::class);
        $this->call(ReasonTableSeeder::class);
        $this->call(DocumentCategoryTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(GuideCategoryTableSeeder::class);
        $this->call(GuideTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(FaqCategoryTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(NewsCategoryTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(TaskListTableSeeder::class);
    }
}
