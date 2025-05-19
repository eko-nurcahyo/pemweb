<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Role jika belum ada
        $this->createRoles();

        // Buat Admin & Mahasiswa
        $admin = $this->createAdmin();
        $mahasiswa = $this->createMahasiswa();

        // Buat Beasiswa Dummy
        [$b1, $b2] = $this->createBeasiswas();

        // Buat Pendaftaran Dummy
        $this->createPendaftaran($mahasiswa, $b1);
    }

    private function createRoles(): void
    {
        Role::firstOrCreate(['name' => 'super_admin']);
        Role::firstOrCreate(['name' => 'mahasiswa']);
    }

    private function createAdmin(): User
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'nim' => '00000001',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('super_admin');

        return $admin;
    }

    private function createMahasiswa(): User
    {
        $mahasiswa = User::create([
            'name' => 'Mahasiswa Uji',
            'email' => 'mhs1@example.com',
            'nim' => '12345678',
            'password' => Hash::make('password'),
        ]);

        $mahasiswa->assignRole('mahasiswa');

        return $mahasiswa;
    }

    private function createBeasiswas(): array
    {
        $b1 = Beasiswa::create([
            'nama' => 'Beasiswa Prestasi Akademik',
            'deskripsi' => 'Untuk mahasiswa dengan IPK tinggi.',
            'jenis' => 'akademik',
            'kuota' => 10,
            'tanggal_mulai' => now()->subDays(5),
            'tanggal_selesai' => now()->addDays(10),
            'deadline' => now()->addDays(7),
            'dokumen_wajib' => json_encode(['KTP', 'KHS']),
            'aktif' => true,
        ]);

        $b2 = Beasiswa::create([
            'nama' => 'Beasiswa Non-Akademik',
            'deskripsi' => 'Untuk prestasi non-akademik.',
            'jenis' => 'non-akademik',
            'kuota' => 5,
            'tanggal_mulai' => now()->subDays(2),
            'tanggal_selesai' => now()->addDays(5),
            'deadline' => now()->addDays(3),
            'dokumen_wajib' => json_encode(['KTP', 'Sertifikat']),
            'aktif' => true,
        ]);

        return [$b1, $b2];
    }

    private function createPendaftaran(User $mahasiswa, Beasiswa $beasiswa): void
    {
        Pendaftaran::create([
            'user_id' => $mahasiswa->id,
            'beasiswa_id' => $beasiswa->id,
            'dokumen' => json_encode([
                'KTP' => 'ktp.pdf',
                'KHS' => 'khs.pdf'
            ]),
            'status' => 'pending',
        ]);
    }
}
