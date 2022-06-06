<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Empleado;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {

       //  \App\Models\Empleado::factory()->create();
       //  \App\Models\Rol::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->CargarRol();


/*
        $e1 =  new Empleado;
        $e1->ci = 899434;
        $e1->nombre_completo = 'Cristhian Cuellar';
        $e1->telefono = 783243;

        $e1->save();*/

         \App\Models\User::factory()->create();
        // \App\Models\Empleado::factory()->create();
       $this->CargarEmpleado();

    }

    public function CargarRol(){
        $tt =  new Rol();
        $tt->id_rol = '1';
        $tt->nombre = 'Admin';
        $tt->descripcion = 'Es el adminstardor del negocio';

        $tt->save();

        $t2 =  new Rol();
        $t2->id_rol = '2';
        $t2->nombre = 'Mesero';
        $t2->descripcion = 'Es el que atinede a lso clientes';

        $t2->save();

        $t=  new Rol();
        $t->id_rol = '3';
        $t->nombre = 'Cocinero';
        $t->descripcion = 'Es el que se quema en la cocina';

        $t->save();


    }

    public function CargarEmpleado(){

        $e = new Empleado();
      //  $u = User::get();

        $e->ci = 8994432;
        $e->nombre_completo = 'cristian ceullar';
        $e->telefono = 110;
        $e->nombre_usuario = User::inRandomOrder()->first()->nombre_usuario;

        $e->save();


        return;


    }
}
