<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Empleado;
use App\Models\User;
use App\Models\TipoProducto;
use App\Models\Producto;
use App\Models\TipoMesa;
use App\Models\Mesa;


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
       $this->CargarTipoProducto();
       $this->CargarProducto();
       $this->CargarTipoMesa();
       $this->CargarMesa();


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

    public function CargarTipoProducto(){
        $e = new TipoProducto();
        $e->id_tipo_plato = 1;
        $e->Categoria = 'Platos';
        $e->descripcion = 'Platos';
        $e->save();

        $e = new TipoProducto();
        $e->id_tipo_plato = 2;
        $e->Categoria = 'Bebidas';
        $e->descripcion = 'Bebidas';
        $e->save();

        $e = new TipoProducto();
        $e->id_tipo_plato = 3;
        $e->Categoria = 'Postres';
        $e->descripcion = 'Postres';
        $e->save();

    }

    public function CargarProducto(){
        $e = new Producto();
        $e->id_producto = 10;
        $e->nombre = 'Pique Macho';
        $e->descripcion = 'asdfg';
        $e->precio = '15';
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 20;
        $e->nombre = 'Chicharon';
        $e->descripcion = 'asdfg';
        $e->precio = '20';
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 30;
        $e->nombre = 'Sopa de Mani';
        $e->descripcion = 'asdfgh';
        $e->precio = '10';
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 40;
        $e->nombre = 'Coca Cola';
        $e->descripcion = 'asdfgty';
        $e->precio = '10';
        $e->id_tipo_plato = 2;
        $e->save();

        $e = new Producto();
        $e->id_producto = 50;
        $e->nombre = 'Sprite';
        $e->descripcion = 'asdfgh';
        $e->precio = '10';
        $e->id_tipo_plato = 2;
        $e->save();

        $e = new Producto();
        $e->id_producto = 60;
        $e->nombre = 'Gelatina';
        $e->descripcion = 'asdfghj';
        $e->precio = '3';
        $e->id_tipo_plato = 3;
        $e->save();

        $e = new Producto();
        $e->id_producto = 70;
        $e->nombre = 'Budin';
        $e->descripcion = 'asdfg';
        $e->precio = '3';
        $e->id_tipo_plato = 3;
        $e->save();
    }

    public function CargarTipoMesa(){
        $e = new TipoMesa();
        $e->id_tipo_mesa = 1;
        $e->mesa = 'Mesa para 2 personas';
        $e->cantidad = '2';
        $e->save();

        $e = new TipoMesa();
        $e->id_tipo_mesa = 2;
        $e->mesa = 'Mesa para 4 personas';
        $e->cantidad = '4';
        $e->save();

        $e = new TipoMesa();
        $e->id_tipo_mesa = 3;
        $e->mesa = 'Mesa para 6 personas';
        $e->cantidad = '6';
        $e->save();
    }

    public function CargarMesa(){
        $e = new Mesa();
        $e->nro_mesa = 20;
        $e->estado = 'Disponible';
        $e->id_tipo_mesa = '2';
        $e->save();

        $e = new Mesa();
        $e->nro_mesa = 21;
        $e->estado = 'Disponible';
        $e->id_tipo_mesa = '2';
        $e->save();

        $e = new Mesa();
        $e->nro_mesa = 22;
        $e->estado = 'Disponible';
        $e->id_tipo_mesa = '2';
        $e->save();


    }


}
