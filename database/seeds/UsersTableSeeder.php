<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            [
                'name' => 'Mauro Lacerda',
                'email' => 'contato@email.com.br',
                'password' => bcrypt('dev1234')
            ],
            [
                'name' => 'Thiago Lacerda',
                'email' => 't_ratsbone@hotmail.com',
                'password' => bcrypt('tR@tsb0n3')
            ]
        ];
        User::insert($listArray);
    }
}
