<?php

namespace Database\Seeders;

use App\Models\KelasModel;
use App\Models\KelasSiswaModel;
use App\Models\MateriModel;
use App\Models\PertemuanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id' => 1,
                'nama' => 'bahasa indonesia',
                'deskripsi' => 'ini adalah kelas bahasa indonesia',
                'hari' => 'senin',
                'mulai' => '08:00:00',
                'selesai' => '10:30:00',
            ],
            [
                'user_id' => 1,
                'nama' => 'pendidikan matematika',
                'deskripsi' => 'ini adalah kelas pendidikan matematika',
                'hari' => 'rabu',
                'mulai' => '08:00:00',
                'selesai' => '10:30:00',
            ],
        ];

        foreach ($datas as $data) {
            KelasModel::create($data);
        }

        $pertemuans = [
            [
                'kelas_id' => 1,
                'judul' => 'perkenalan bahasa',
                'deskripsi' => 'ini adalah pertemuan pertama',
            ],
            [
                'kelas_id' => 1,
                'judul' => 'asal usul bahasa',
                'deskripsi' => 'ini adalah pertemuan pertama',
            ],
            [
                'kelas_id' => 1,
                'judul' => 'perkembangan bahasa',
                'deskripsi' => 'ini adalah pertemuan pertama',
            ],
        ];

        foreach ($pertemuans as $pertemuan) {
            PertemuanModel::create($pertemuan);
        }


        // create materi
        $materis = [
            [
                'pertemuan_id' => 1,
                'judul' => 'materi satu',
                'path' => 'default.pdf'
            ],
            [
                'pertemuan_id' => 1,
                'judul' => 'materi dua',
                'path' => 'default.pdf'
            ],
        ];

        foreach ($materis as $materi) {
            MateriModel::create($materi);
        }

        // register siswa ke kelas
        KelasSiswaModel::create([
            'user_id' => 3,
            'kelas_id' => 1,
        ]);
    }
}
