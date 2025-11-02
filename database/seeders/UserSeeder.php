<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role
        $mhsRole  = Role::firstOrCreate(['name' => 'mahasiswa']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // ===== ADMIN =====
        $adminUser = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser->assignRole($adminRole);

        // ===== MAHASISWA =====
        $mhsUser = User::factory()->create([
            'name' => 'Mahasiswa Uji',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        $mhsUser->assignRole($mhsRole);

        // Buat relasi mahasiswa
        Mahasiswa::create([
            'user_id' => $mhsUser->id,
            'nim' => '2201001',
            'nama' => 'Mahasiswa Uji',
            'kode_pt' => '001001',
            'kode_prodi' => 'IF001',
            'tahun_lulus' => 2025,
            'telepon' => '081234567890',
            'email' => 'mahasiswa@mail.com',
            'nik' => '73101123123',
            'npwp' => null,
        ]);
    }
}
