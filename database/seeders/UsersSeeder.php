<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Jika ada FK ke users, amankan truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            [
                'name'           => 'Super Admin',
                'email'          => 'superadmin@example.com',
                'username'       => 'superadmin',
                'email_verified_at' => null,
                'password'       => Hash::make('ateblukup'),
                'remember_token' => Str::random(10),
                'role'           => 'superadmin',
                'nama_lengkap'   => 'Super Admin',
                'aktif'          => 1,
                'created_at'     => '2025-08-22 08:09:35',
            ],
            [
                'name'           => 'Admin Desa 1',
                'email'          => 'admin1@example.com',
                'username'       => 'admin1',
                'email_verified_at' => null,
                'password'       => Hash::make('password-admin1'),
                'remember_token' => Str::random(10),
                'role'           => 'admin',
                'nama_lengkap'   => 'Admin Desa 1',
                'aktif'          => 1,
                'created_at'     => '2025-08-22 08:09:48',
            ],
            [
                'name'           => 'Operator Desa 1',
                'email'          => 'operator1@example.com',
                'username'       => 'operator1',
                'email_verified_at' => null,
                'password'       => Hash::make('password-operator1'),
                'remember_token' => Str::random(10),
                'role'           => 'operator',
                'nama_lengkap'   => 'Operator Desa 1',
                'aktif'          => 1,
                'created_at'     => '2025-08-22 08:09:48',
            ],
        ]);
    }
}
