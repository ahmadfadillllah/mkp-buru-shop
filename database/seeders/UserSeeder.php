<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            'provinsi_id' => 27,
            'kota_id' => 420,
            'kecamatan_id' => 5834,
            'kelurahan_id' => 69873,
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'avatar' => 'user.png',
            'alamat' => 'Fakultas Ilmu Komputer UMI',
            'nohp' => '082398143023',
            'zipcode' => '90231',
        ]);
    }
}
