<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'c_tela']);
        $role3 = Role::create(['name' => 'cost']);
        $role4 = Role::create(['name' => 'c_mad']);
        $role5 = Role::create(['name' => 'arm']);
        $role6 = Role::create(['name' => 'emparr']);
        $role7 = Role::create(['name' => 'c_esp']);
        $role8 = Role::create(['name' => 'p_blan']);
        $role9 = Role::create(['name' => 'tapic']);
        $role10 = Role::create(['name' => 'ensam']);
        $role11 = Role::create(['name' => 'despa']);

        //Permission::create(['name'=>'admin.Fechas.guardar'])->assignRole($role1);
        // Permission::create(['name'=>'admin.Fechas.actualizar'])->syncRoles([$role1,$role2]);
        // Permission::create(['name'=>'admin.Fechas.exportar.excel']);
        // Permission::create(['name'=>'admin.Fechas.importar.excel']);

    }
}
