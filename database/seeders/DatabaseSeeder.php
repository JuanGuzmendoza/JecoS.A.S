<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
