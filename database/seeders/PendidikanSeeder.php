<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\PendidikanModel;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
        [
            [
                'nama_institusi' => 'SMK 1 Pundong',
                'jenjang' => 'SMK',
                'angkatan' => '2020',
                'jurusan' => 'Teknik Komputer Jaringan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_institusi' => 'Mercu Buana Yogyakarta',
                'jenjang' => 'S1',
                'angkatan' => '2022',
                'jurusan' => 'Sistem Informasi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        PendidikanModel::insert($data);
    }
}
