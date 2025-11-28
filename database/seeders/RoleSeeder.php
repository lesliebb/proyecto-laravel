<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver categorías']);
        Permission::create(['name' => 'crear categorías']);
        Permission::create(['name' => 'editar categorías']);
        Permission::create(['name' => 'eliminar categorías']);
        Permission::create(['name' => 'ver posts']);
        Permission::create(['name' => 'crear posts']);
        Permission::create(['name' => 'editar posts']);
        Permission::create(['name' => 'eliminar posts']);

        // 2. Crear un Rol para usuarios normales 
        $role = Role::create(['name' => 'editor']);

        // 3. Asignar permisos al rol (ejemplo: solo ver y crear, no borrar)
        $role->givePermissionTo(['ver categorías', 'crear categorías', 'ver posts', 'crear posts']);

        // 4. Crear un Rol para administradores
        $adminRole = Role::create(['name' => 'admin']);
        // 5. Asignar todos los permisos al rol de administrador
        $adminRole->givePermissionTo(Permission::all());
    }

}