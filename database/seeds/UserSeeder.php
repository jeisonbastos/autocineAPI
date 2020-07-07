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
        $usuario = \App\User::create([
            'nombre' => 'Jeison',
            'primer_apellido' => 'Bastos',
            'segundo_apellido' => 'Jimenez',
            'correo_electronico' => 'jeison.bastos@hotmail.com',
            'password' => '123456',
            'role_id' => 1
        ]);

        $usuario = \App\User::create([
            'nombre' => 'Usuario 1',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'correo_electronico' => 'usuario1@hotmail.com',
            'password' => '123456',
            'role_id' => 2
        ]);

        $usuario = \App\User::create([
            'nombre' => 'Usuario 2',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'correo_electronico' => 'usuario2@gmail.com',
            'password' => '123456',
            'role_id' => 2
        ]);

        $usuario = \App\User::create([
            'nombre' => 'Usuario 3',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'correo_electronico' => 'usuario3@outlook.com',
            'password' => '123456',
            'role_id' => 2
        ]);
    }
}
