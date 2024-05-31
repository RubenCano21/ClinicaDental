<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            [
                'nombre' => 'Consulta ',
                'precio' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Limpieza Dental',
                'precio' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Extracción Dental',
                'precio' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ortodoncia',
                'precio' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Endodoncia',
                'precio' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Cirugia',
                'precio' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Estetica Dental',
                'precio' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}