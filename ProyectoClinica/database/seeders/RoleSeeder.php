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
    
        Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'admin.citas.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.citas.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.citas.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.citas.destroy'])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'admin.reservas.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.reservas.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.reservas.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.reservas.destroy'])->syncRoles([$role1,$role3]);
    
        Permission::create(['name' => 'admin.servicios.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.servicios.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.servicios.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'admin.servicios.destroy'])->syncRoles([$role1,$role3]);
}
}