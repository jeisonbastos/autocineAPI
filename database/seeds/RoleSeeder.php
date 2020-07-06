<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Objeto
        $rol=new \App\Role();
        $rol->nombre='admininstrador';
        $rol->save();

        $rol = new \App\Role();
        $rol->nombre = 'cliente';
        $rol->save();
    }
}
