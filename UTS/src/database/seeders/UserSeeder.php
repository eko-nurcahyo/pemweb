<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan role 'mahasiswa' sudah tersedia
        Role::firstOrCreate(['name' => 'mahasiswa']);

        // Cek apakah user sudah ada, jika belum baru buat
        $user = User::firstOrCreate(
            ['email' => 'rani@example.com'],
            [
                'name' => 'Rani Mahasiswa',
                'password' => bcrypt('password'),
                'nim' => '220123456',
            ]
        );

        // Pastikan dia punya role 'mahasiswa'
        if (!$user->hasRole('mahasiswa')) {
            $user->assignRole('mahasiswa');
        }
    }
}