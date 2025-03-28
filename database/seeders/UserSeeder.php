<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert ke tabel user_login
        $userId = DB::table('user_login')->insertGetId([
            'user_name' => 'admin',
            'user_pass' => Hash::make('phicosdev123?'),
        ]);

        // Insert ke tabel user_detail
        DB::table('user_detail')->insert([
            'id_user' => $userId,
            'nama' => 'Super Admin',
            'role' => '1',
            'id_opd' => 1,
            'is_active' => 1,
            'ditambahkan' => now(),
            'diupdate' => now(),
            'ditambahkan_oleh' => 0,
            'diupdate_oleh' => 0,
            'is_delete' => null,
            'dihapus_oleh' => null,
            'no_ktp' => '123123',
            'no_hp' => '081558739861123',
            'email' => 'ramadhanwahyu@student.uns.ac.id',
            'alamat' => 'Kauman RT 03 RW 07 Ngasem Colomadu',
            'kecamatan' => '40303',
            'desa' => '040303AC',
        ]);
    }
}
