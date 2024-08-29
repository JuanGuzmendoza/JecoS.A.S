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

        $users = [
            ['name' => 'Corte Tela', 'email' => 'corte_tela@gmail.com'],
            ['name' => 'Costura', 'email' => 'costura@gmail.com'],
            ['name' => 'Corte Madera', 'email' => 'corte_madera@gmail.com'],
            ['name' => 'Armado', 'email' => 'armado@gmail.com'],
            ['name' => 'Emparrillado', 'email' => 'emparrillado@gmail.com'],
            ['name' => 'Corte Pluma', 'email' => 'corte_pluma@gmail.com'],
            ['name' => 'Blanqueo', 'email' => 'blanqueo@gmail.com'],
            ['name' => 'Tapiceria', 'email' => 'tapiceria@gmail.com'],
            ['name' => 'Ensamble', 'email' => 'ensamble@gmail.com'],
            ['name' => 'Despacho', 'email' => 'despacho@gmail.com'],
            ['name' => 'Admin', 'email' => 'admin@gmail.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
