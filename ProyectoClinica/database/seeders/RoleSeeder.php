<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {  
    $role1 =Role::create(['name'=>'Administrador']);  
    $role2 =Role::create(['name'=>'Paciente']); 
    $role3 =Role::create(['name'=>'Odontologo']); 
    $role4 =Role::create(['name'=>'Recepcionista']); 

    $role1->syncPermissions( ['ver dashboard', 'crear cita', 'actualizar cita', 'cancelar cita', 'ver usuarios', 'crear usuario', 'eliminar usuario', 'actualizar usuario', 'ver bitacora', 'ver especialidades', 'asignar especialidad', 'eliminar especialidad','ver reservas', 'crear reserva', 'actualizar reserva', 'eliminar reserva', 'ver pacientes', 'crear pacientes', 'eliminar pacientes', 'actualizar pacientes', 'ver odontologos', 'crear odontologo', 'eliminar odontologo', 'actualizar odontologo', 'ver recepcionistas', 'crear recepcionista', 'eliminar recepcionista', 'actualizar recepcionista', 'ver servicios', 'crear servicio', 'eliminar servicio', 'actualizar servicio']);
    $role2->syncPermissions( ['ver dashboard', 'ver citas', 'crear cita', 'actualizar cita', 'cancelar cita', 'ver especialidades', 'ver tratamientos', 'crear tratamiento', 'actualizar tratamiento', 'ver odontograma', 'ver reservas', 'crear reserva', 'actualizar reserva', 'eliminar reserva', 'ver historial clinico', 'ver odontologos']);
    $role3->syncPermissions( ['ver dashboard', 'ver citas', 'ver usuarios', 'ver especialidades', 'ver tratamientos', 'crear tratamiento', 'actualizar tratamiento', 'ver odontograma', 'actualizar odontograma', 'ver reservas', 'crear reserva', 'actualizar reserva', 'eliminar reserva', 'ver historial clinico', 'actualizar historial clinico', 'ver pacientes', 'crear pacientes', 'eliminar pacientes', 'actualizar pacientes', 'ver odontologos', 'ver recepcionistas']);
    $role4->syncPermissions( ['ver dashboard', 'ver citas', 'crear cita', 'actualizar cita', 'cancelar cita', 'ver especialidades', 'ver tratamientos', 'actualizar tratamiento', 'ver reservas', 'crear reserva', 'actualizar reserva', 'eliminar reserva', 'ver historial clinico', 'actualizar historial clinico', 'ver pacientes', 'crear pacientes', 'eliminar pacientes', 'actualizar pacientes', 'ver odontologos', 'ver recepcionistas']);
        

        // Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2, $role3, $role4]);

        // Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1,$role3]);

        // Permission::create(['name' => 'admin.citas.index'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.citas.create'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.citas.edit'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.citas.destroy'])->syncRoles([$role1,$role3]);

        // Permission::create(['name' => 'admin.reservas.index'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.reservas.create'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.reservas.edit'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.reservas.destroy'])->syncRoles([$role1,$role3]);
    
        // Permission::create(['name' => 'admin.servicios.index'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.servicios.create'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.servicios.edit'])->syncRoles([$role1,$role3]);
        // Permission::create(['name' => 'admin.servicios.destroy'])->syncRoles([$role1,$role3]);
}
}