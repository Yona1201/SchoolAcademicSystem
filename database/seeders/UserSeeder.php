<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'administrator',
                'email' => 'admin@gmail.com',
                'jenis_kelamin' => 'l',
                'phone' => '000000000000',
                'role' => 0,
                'password' => Hash::make('admin123')
            ],
            [
                'nama' => 'guru satu',
                'email' => 'guru1@gmail.com',
                'jenis_kelamin' => 'l',
                'phone' => '081311113333',
                'role' => 1,
                'password' => Hash::make('guru123')
            ],
            [
                'nama' => 'parent satu',
                'email' => 'parent1@gmail.com',
                'jenis_kelamin' => 'l',
                'phone' => '081322223333',
                'role' => 2,
                'password' => Hash::make('parent123')
            ],
            [
                'nama' => 'siswa satu',
                'email' => 'siswa1@gmail.com',
                'jenis_kelamin' => 'l',
                'phone' => '081333333333',
                'role' => 3,
                'password' => Hash::make('siswa123')
            ],
        ];

        foreach ($datas as $data) {
            User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'password' => $data['password']
            ]);
        }
    }
}
