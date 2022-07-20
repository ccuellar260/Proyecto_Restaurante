<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Rol;
use App\Models\Permiso;
use App\Models\PermisoRol;
use App\Models\RolUsuario;
use App\Models\Empleado;
use App\Models\User;
use App\Models\TipoProducto;
use App\Models\Producto;
use App\Models\TipoMesa;
use App\Models\Mesa;
use App\Models\Ambiente;
use App\Models\Turno;
use App\Models\EmpleadoTurno;

//ibreria spity
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {

        $this->CargarRolePermisos(); //roles y permisos
        $this->CargarUsuariosEmpleados(); //user y roles
        // \App\Models\User::factory()->create();
        // \App\Models\Empleado::factory()->create();
       $this->CargarEmpleado();
       $this->CargarTurno();
       $this->CargarMarcarTurno();
       $this->CargarTipoProducto();
       $this->CargarProducto();
       $this->CargarTipoMesa();
       $this->CargarAmbiente();
       $this->CargarMesa();


    }

    // public function CargaUser(){
    //     $user = new User();
    //     $user->nombre_usuario = 'cristhian22';
    //     $user->correo_electronico = 'osvaldo.marvin@example.net';
    //     $user->password =  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
    //     $user->remember_token =  Str::random(10);
    //     $user->fecha_cambio_contra = date('Y-m-d');
    //     $user->save();
    // }

    // cargar roles y permisos
    public function CargarRolePermisos()
    {
        // creamos los roles
        $Admin          = Role::create(['name' => 'Administrador']);
        $Meseros         = Role::create(['name' => 'Mesero']);
        $Cocineros       = Role::create(['name' => 'Cocinero']);

        ////////////admin
        Permission::create(['name' => 'admin'])->syncRoles([$Admin]);
        ////////////Pedidos
        Permission::create(['name' => 'Pedidos.index'])->syncRoles([$Admin,$Meseros]);
        Permission::create(['name' => 'Pedidos.admin.mesa'])->syncRoles([$Admin]);
        Permission::create(['name' => 'Pedidos.mesero.mesa'])->syncRoles([$Meseros]);
        Permission::create(['name' => 'Pedidos.consulta'])->syncRoles([$Admin]);
        Permission::create(['name' => 'Pedidos.realizar.pedido'])->syncRoles([$Admin,$Meseros]);
        Permission::create(['name' => 'Pedidos.bitacora'])->syncRoles([$Admin]);
        Permission::create(['name' => 'Pedidos.en.cocina'])->syncRoles([$Admin,$Meseros]);
        Permission::create(['name' => 'Pedidos.listo'])->syncRoles([$Admin,$Cocineros]);
        Permission::create(['name' => 'Pedidos.pagar'])->syncRoles([$Admin,$Meseros]);
        ////////////roles
        Permission::create(['name' => 'roles.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'roles.creatit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'roles.delee'])->syncRoles([$Admin]);
        Permission::create(['name' => 'roles.edte'])->syncRoles([$Admin]);
        ////////////empleados
        Permission::create(['name' => 'empleados.index'])->syncRoles([$Admin,$Meseros,$Cocineros]);
        Permission::create(['name' => 'empleados.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'empleados.edit'])->syncRoles([$Admin,$Meseros,$Cocineros]);
        Permission::create(['name' => 'empleados.delete'])->syncRoles([$Admin]);
        Permission::create(['name' => 'empleados.bitacora'])->syncRoles([$Admin]);
        ////////////Mesas
        Permission::create(['name' => 'mesas.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.delete'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.ambiente'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.ambiente.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.ambiente.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.ambiente.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'mesas.ambiente.delete'])->syncRoles([$Admin]);
        ////////////
        Permission::create(['name' => 'productos.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'productos.delete'])->syncRoles([$Admin]);
        Permission::create(['name' => 'productos.consulta'])->syncRoles([$Admin]);
        Permission::create(['name' => 'productos.bitacora'])->syncRoles([$Admin]);
        ////////////
        Permission::create(['name' => 'cliente.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'cliente.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'cliente.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'cliente.delete'])->syncRoles([$Admin]);
        Permission::create(['name' => 'cliente.bitacora'])->syncRoles([$Admin]);
        ////////////
        Permission::create(['name' => 'turno.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'turno.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'turno.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'turno.delete'])->syncRoles([$Admin]);
        Permission::create(['name' => 'turno.asignar'])->syncRoles([$Admin]);
        ////////////
        Permission::create(['name' => 'reserva.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'reserva.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'reserva.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'reserva.delete'])->syncRoles([$Admin]);
        Permission::create(['name' => 'reserva.bitacora'])->syncRoles([$Admin]);
        ////////////
        Permission::create(['name' => 'dashboard'])->syncRoles([$Admin]);
        Permission::create(['name' => 'dashboard.empleado'])->syncRoles([$Meseros,$Cocineros]);
        Permission::create(['name' => 'logout'])->syncRoles([$Admin,$Meseros,$Cocineros]);
        ////////////
        // Permission::create(['name' => 'Mesero'])->syncRoles([$Admin,$Meseros]);
        ////////////

        // // creamos los permisos
        // $permisos = [
        //     'menu',
        //     'bitacora',
        //     'consultas',
        //     'create',
        //     'read',
        //     'update',
        //     'delete',
        // ];

        // // a cada rol le asignamos los permisos
        // foreach (Role::all() as $rol) {
        //     foreach ($permisos as $p) {
        //         Permission::create(['name' => "{$rol->name} $p"]);
        //     }
        // }

        // // unir permisos con los roles
        // $Admin->syncPermissions(Permission::all());
        // $Meseros->syncPermissions(Permission::where('name', 'like', '%Mesero%')->get());
        // $Cocineros->syncPermissions(Permission::where('name', 'like', '%Cocinero%')->get());

        // // unir roles con los usuarios
        // // $Administrador->assignRole('Administrador');
        // // $Mesero->assignRole('Mesero');
        // // $Cocinero->assignRole('Cocinero');
        // //cargar un usuario administrador


    }

    //cargar roles a los usarios
    public function CargarUsuariosEmpleados()
    {

        User::create([
            'nombre_usuario' => 'cristhian22',
            'correo_electronico' => 'osvaldo.marvin@example.net',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'fecha_cambio_contra' => date('Y-m-d'),
        ])->assignRole('Administrador');

    }



    public function CargarEmpleado(){

        $e = new Empleado();
        $e->ci = 8994432;
        $e->nombre_completo = 'Cristian Cuellar';
        $e->telefono = 110;
        $e->foto = '1657436258-critian.jpg';
        $e->nombre_usuario = User::inRandomOrder()->first()->nombre_usuario;
        $e->save();


        return;
    }

    public function CargarTurno(){
        $e = new Turno();
      //  $u = User::get();

        $e->id_turno = 1;
        $e->descripcion = 'Admin';
        $e->hora_entrada = '08:00';
        $e->hora_salida = '22:00';
        $e->save();
        return;
    }

    public function CargarMarcarTurno(){
        $e = new EmpleadoTurno();
        $e->id = 1;
        $e->id_turno = 1;
        $e->id_empleado = 8994432;
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
        $e->url = 'pique-de-macho-2-1-700x531.png';
        $e->precio = '15';
        $e->cantidadMomento = 40;
        $e->cantidadActualizar = 40;
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 20;
        $e->nombre = 'Chicharon';
        $e->descripcion = 'asdfg';
        $e->url = 'chicharron_cerdo_yo_chef.jpg';
        $e->precio = '20';
        $e->cantidadMomento = 40;
        $e->cantidadActualizar = 40;
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 30;
        $e->nombre = 'Sopa de Mani';
        $e->descripcion = 'asdfgh';
        $e->url = 'sopa-de-mani-comida-boliviana-480x270.jpg';
        $e->precio = '10';
        $e->cantidadMomento = 40;
        $e->cantidadActualizar = 40;
        $e->id_tipo_plato = 1;
        $e->save();

        $e = new Producto();
        $e->id_producto = 40;
        $e->nombre = 'Coca Cola';
        $e->descripcion = 'asdfgty';
        $e->url = 'Majadito.jpg';
        $e->precio = '10';
        $e->cantidadMomento = 30;
        $e->cantidadActualizar = 30;
        $e->id_tipo_plato = 2;
        $e->save();

        $e = new Producto();
        $e->id_producto = 50;
        $e->nombre = 'Sprite';
        $e->descripcion = 'asdfgh';
        $e->url = '2.5-lts-2.jpg';
        $e->precio = '10';
        $e->cantidadMomento = 30;
        $e->cantidadActualizar = 30;
        $e->id_tipo_plato = 2;
        $e->save();

        $e = new Producto();
        $e->id_producto = 60;
        $e->nombre = 'Gelatina';
        $e->descripcion = 'asdfghj';
        $e->url = '5f5751abd0d13.r_d.633-427-8027.jpeg';
        $e->precio = '3';
        $e->cantidadMomento = 10;
        $e->cantidadActualizar = 10;
        $e->id_tipo_plato = 3;
        $e->save();

        $e = new Producto();
        $e->id_producto = 70;
        $e->nombre = 'Budin';
        $e->descripcion = 'asdfg';
        $e->url = 'Pudin-de-pan-casero-2-768x514.jpg';
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
