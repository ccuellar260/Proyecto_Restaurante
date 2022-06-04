<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rol>
 */
class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       

        return $table= [[
            //'id_rol'     => $this->faker;
         //   'nombre'     => $this->faker->name(),
           // 'descripcion'=> $this->faker->sentence()
           'nombre'     => 'Admin',
           'descripcion'=> 'Es el administtrado del negocio'
    ],
    [
        'nombre'     => 'Empleado',
        'descripcion'=> 'Es el Empleado'
    ],
    [
        'nombre'     => 'Cocinero',
        'descripcion'=> 'Es el Cocinero'
    ]
    ];

    }
}
