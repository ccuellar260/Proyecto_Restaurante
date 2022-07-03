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
use App\Models\Ambiente;



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
       $this->CargarAmbiente();
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
        $e->nombre_completo = 'Osvaldo Marvin';
        $e->telefono = 110;
        $e->foto = 'https://scontent.fsrz1-2.fna.fbcdn.net/v/t1.6435-9/80696374_748798835606543_4948905216759037952_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=174925&_nc_ohc=5H4yKOwPuQwAX_4qBwD&_nc_ht=scontent.fsrz1-2.fna&oh=00_AT_mT1-DZzU9ff9-UtrviuL_mfttDdLZoHcqPmUpBM9bFA&oe=62CF3E76';
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
        $e->url = 'https://chipabythedozen.com/wp-content/uploads/2020/07/pique-de-macho-2-1-700x531.png';
        $e->precio = '15';
        $e->cantidadMomento = 40;
        $e->cantidadActualizar = 40;
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 20;
        $e->nombre = 'Chicharon';
        $e->descripcion = 'asdfg';
        $e->url = 'https://sofia.com.bo/wp-content/uploads/2021/06/chicharron_cerdo_yo_chef.jpg';
        $e->precio = '20';
        $e->cantidadMomento = 40;
        $e->cantidadActualizar = 40;
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 30;
        $e->nombre = 'Sopa de Mani';
        $e->descripcion = 'asdfgh';
        $e->url = 'https://comidasbolivianas.org/wp-content/uploads/2020/09/sopa-de-mani-comida-boliviana-480x270.jpg';
        $e->precio = '10';
        $e->cantidadMomento = 40;
        $e->cantidadActualizar = 40;
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 40;
        $e->nombre = 'Coca Cola';
        $e->descripcion = 'asdfgty';
        $e->url = 'https://loccopizzaoporto.es/wp-content/uploads/2019/03/Coca-Cola-Bottle-2L-1-1.jpg';
        $e->precio = '10';
        $e->cantidadMomento = 30;
        $e->cantidadActualizar = 30;
        $e->id_tipo_plato = 2;
        $e->save();

        $e = new Producto();
        $e->id_producto = 50;
        $e->nombre = 'Sprite';
        $e->descripcion = 'asdfgh';
        $e->url = 'https://i1.wp.com/veryperu.com/wp-content/uploads/2020/06/2.5-lts-2.jpg';
        $e->precio = '10';
        $e->cantidadMomento = 30;
        $e->cantidadActualizar = 30;
        $e->id_tipo_plato = 2;
        $e->save();

        $e = new Producto();
        $e->id_producto = 60;
        $e->nombre = 'Gelatina';
        $e->descripcion = 'asdfghj';
        $e->url = 'https://www.lavanguardia.com/files/image_948_465/files/fp/uploads/2020/09/08/5f5751abd0d13.r_d.633-427-8027.jpeg';
        $e->precio = '3';
        $e->cantidadMomento = 10;
        $e->cantidadActualizar = 10;
        $e->id_tipo_plato = 3;
        $e->save();

        $e = new Producto();
        $e->id_producto = 70;
        $e->nombre = 'Budin';
        $e->descripcion = 'asdfg';
        $e->url = 'https://www.recetasderechupete.com/wp-content/uploads/2020/11/Pudin-de-pan-casero-2-768x514.jpg';
        $e->precio = '3';
        $e->cantidadMomento = 10;
        $e->cantidadActualizar = 10;
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
        $e->id_ambiente=1;
        //$e->ci_empleado = 'null';
        $e->save();

        $e = new Mesa();
        $e->nro_mesa = 21;
        $e->estado = 'Disponible';
        $e->id_tipo_mesa = '2';
        $e->id_ambiente=1;
      //  $e->ci_empleado =  'null';
        $e->save();

        $e = new Mesa();
        $e->nro_mesa = 22;
        $e->estado = 'Disponible';
        $e->id_tipo_mesa = '2';
        $e->id_ambiente=1;
     //   $e->ci_empleado = 'null';
        $e->save();
    }

    public function CargarAmbiente(){
        $e = new Ambiente();
        $e->id_ambiente= 1 ;
        $e->nombre= 'Adentro';
        $e->descripcion='adentro';
        $e->capacidad=12;
        $e->estado='disponible';
        $e->save();

        $e = new Ambiente();
        $e->id_ambiente= 2;
        $e->nombre= 'Fuera';
        $e->descripcion='fuera';
        $e->capacidad=6;
        $e->estado='disponible';
        $e->save();
    }


}
