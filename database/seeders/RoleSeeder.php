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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Corte_tela']);
        $role3 = Role::create(['name' => 'Costura']);
        $role4 = Role::create(['name' => 'Corte_madera']);
        $role5 = Role::create(['name' => 'Armado']);
        $role6 = Role::create(['name' => 'Emparrillado']);
        $role7 = Role::create(['name' => 'Corte_espuma']);
        $role8 = Role::create(['name' => 'Blanqueo']);
        $role9 = Role::create(['name' => 'Tapiceria']);
        $role10 = Role::create(['name' => 'Ensamble']);
        $role11 = Role::create(['name' => 'Despacho']);

        //Permission::create(['name'=>'admin.Fechas.guardar'])->assignRole($role1);
        // Permission::create(['name'=>'admin.Fechas.actualizar'])->syncRoles([$role1,$role2]);
        // Permission::create(['name'=>'admin.Fechas.exportar.excel']);
        // Permission::create(['name'=>'admin.Fechas.importar.excel']);

    }
}
