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
            ['name' => 'Corte Tela', 'email' => 'corte_tela@gmail.com', 'Rol' => 'Corte_tela'],
            ['name' => 'Costura', 'email' => 'costura@gmail.com', 'Rol' => 'Costura'],
            ['name' => 'Corte Madera', 'email' => 'corte_madera@gmail.com', 'Rol' => 'Corte_madera'],
            ['name' => 'Armado', 'email' => 'armado@gmail.com', 'Rol' => 'Armado'],
            ['name' => 'Emparrillado', 'email' => 'emparrillado@gmail.com', 'Rol' => 'Emparrillado'],
            ['name' => 'Corte Pluma', 'email' => 'corte_pluma@gmail.com', 'Rol' => 'Corte_espuma'],
            ['name' => 'Blanqueo', 'email' => 'blanqueo@gmail.com', 'Rol' => 'Blanqueo'],
            ['name' => 'Tapiceria', 'email' => 'tapiceria@gmail.com', 'Rol' => 'Tapiceria'],
            ['name' => 'Ensamble', 'email' => 'ensamble@gmail.com', 'Rol' => 'Ensamble'],
            ['name' => 'Despacho', 'email' => 'despacho@gmail.com', 'Rol' => 'Despacho'],

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
