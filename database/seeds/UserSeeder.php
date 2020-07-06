<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario= \App\User::create([
            'name'=>'Jeison Bastos',
            'email'=>'jeison.bastos@hotmail.com',
            'password'=>'123456',
            'role_id'=>1
        ]);

        $usuario = \App\User::create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@hotmail.com',
            'password' => '123456',
            'role_id' => 2
        ]);

        $usuario = \App\User::create([
            'name' => 'Usuario 2',
            'email' => 'usuario2@gmail.com',
            'password' => '123456',
            'role_id' => 2
        ]);

        $usuario = \App\User::create([
            'name' => 'Usuario 3',
            'email' => 'usuario3@outlook.com',
            'password' => '123456',
            'role_id' => 2
        ]);
    }
}
