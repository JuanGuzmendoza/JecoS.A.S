<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\portafolio_productos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $users = [

            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'Rol' => 'Admin'],
            ['name' => 'Corte Tela', 'email' => 'corte_tela@gmail.com', 'Rol' => 'c_tela'],
            ['name' => 'Costura', 'email' => 'costura@gmail.com', 'Rol' => 'cost'],//error
            ['name' => 'Corte Madera', 'email' => 'corte_madera@gmail.com', 'Rol' => 'c_mad'],
            ['name' => 'Armado', 'email' => 'armado@gmail.com', 'Rol' => 'arm'],
            ['name' => 'Emparrillado', 'email' => 'emparrillado@gmail.com', 'Rol' => 'emparr'],
            ['name' => 'Corte Pluma', 'email' => 'corte_pluma@gmail.com', 'Rol' => 'c_esp'],
            ['name' => 'Blanqueo', 'email' => 'blanqueo@gmail.com', 'Rol' => 'p_blan'],
            ['name' => 'Tapiceria', 'email' => 'tapiceria@gmail.com', 'Rol' => 'tapic'],
            ['name' => 'Ensamble', 'email' => 'ensamble@gmail.com', 'Rol' => 'ensam'],
            ['name' => 'Despacho', 'email' => 'despacho@gmail.com', 'Rol' => 'despa'],

        ];
        $Portafolio = [
            ['codigo' => '7023395', 'nombre' => 'SALA RINCONERA HOLDEN EUROLINO MARFIL', 'cost_unit' => 1950000],
            ['codigo' => '7030982', 'nombre' => 'SOFACAMA PIERO VELVET LAUREL ARENA B', 'cost_unit' => 1375000],
            ['codigo' => '7023788', 'nombre' => 'SALA RINCONERA HOLDEN EURO MARFIL LA DER', 'cost_unit' => 1950000],
            ['codigo' => '7032939', 'nombre' => 'SOFACAMA APOLO EUROL VERTIGO GRIS/NATUR', 'cost_unit' => 1147000],
            ['codigo' => '7032352', 'nombre' => 'SALA CAMA HOLDEN EUROL GAIRA PLATA PREM', 'cost_unit' => 2184970],
            ['codigo' => '7027068', 'nombre' => 'SOFACAMA APOLO VELVET BRAGANZ MARF/CHAMP', 'cost_unit' => 997479],
            ['codigo' => '7031885', 'nombre' => 'SALA CAMA ALANA VELVET ARMONICA BEIGE', 'cost_unit' => 2100840],
        ];
        foreach ($Portafolio as $p) {
            portafolio_productos::create([
                'codigo'=>$p['codigo'],
                'nombre'=>$p['nombre'],
                'cost_unit'=>$p['cost_unit'],
            ]);
        }
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ])->assignRole($user['Rol']);
        }
    }
}
