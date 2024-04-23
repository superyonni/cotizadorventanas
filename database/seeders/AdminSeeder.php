<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'jonathan',
            'email' => 'jonathan@cotizador.cl',
            'email_verified_at' => now(),
            'password' => '$2y$12$gNVaONw9Y72V0w4K0Rza2us5yyC1uhBTZNC88.ejycMq52g2i1/lu', // password
        ]);
        $user -> assignRole('admin');
    }
}
