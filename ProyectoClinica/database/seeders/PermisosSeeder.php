<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermisosSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {  
        Permission::create(['name' => 'ver dashboard']);

        Permission::create(['name' => 'ver citas']);
        Permission::create(['name' => 'crear cita']);
        Permission::create(['name' => 'actualizar cita']);
        Permission::create(['name' => 'cancelar cita']);
        
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'eliminar usuario']);
        Permission::create(['name' => 'actualizar usuario']);
        
        Permission::create(['name' => 'ver bitacora']);
        
        Permission::create(['name' => 'ver especialidades']);
        Permission::create(['name' => 'asignar especialidad']);
        Permission::create(['name' => 'eliminar especialidad']);

        Permission::create(['name' => 'ver tratamientos']);
        Permission::create(['name' => 'crear tratamiento']);
        Permission::create(['name' => 'actualizar tratamiento']);

        Permission::create(['name' => 'ver odontograma']);
        Permission::create(['name' => 'actualizar odontograma']);

        Permission::create(['name' => 'ver reservas']);
        Permission::create(['name' => 'crear reserva']);
        Permission::create(['name' => 'actualizar reserva']);
        Permission::create(['name' => 'eliminar reserva']);
        
        Permission::create(['name' => 'ver historial clinico']);
        Permission::create(['name' => 'actualizar historial clinico']);
        
        Permission::create(['name' => 'ver pacientes']);
        Permission::create(['name' => 'crear pacientes']);
        Permission::create(['name' => 'eliminar pacientes']);
        Permission::create(['name' => 'actualizar pacientes']);

        Permission::create(['name' => 'ver odontologos']);
        Permission::create(['name' => 'crear odontologo']);
        Permission::create(['name' => 'eliminar odontologo']);
        Permission::create(['name' => 'actualizar odontologo']);

        Permission::create(['name' => 'ver recepcionistas']);
        Permission::create(['name' => 'crear recepcionista']);
        Permission::create(['name' => 'eliminar recepcionista']);
        Permission::create(['name' => 'actualizar recepcionista']);

        Permission::create(['name' => 'ver servicios']);
        Permission::create(['name' => 'crear servicio']);
        Permission::create(['name' => 'eliminar servicio']);
        Permission::create(['name' => 'actualizar servicio']);
    }
}