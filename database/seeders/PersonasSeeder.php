<?php

namespace Database\Seeders;
use App\Models\Persona;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Persona::create([

            'nombre' => 'weimar',
            'apellido' => 'Ustares Rivera',
            'celular' => '8324893',
            'correo' => 'weimar@gmail.com',



            // Resto de los atributos
        ]);
    }
}
//php artisan db:seed --class=PersonasSeeder  para actualizar
