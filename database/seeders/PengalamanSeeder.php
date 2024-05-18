<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\PengalamanModel;

class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
        [
            [
                'nama_pt'=> 'PT Sigma',
                'posisi'=> 'Data Analyst',
                'mulai'=> '2021',
                'lokasi'=> 'Yogyakarta',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_pt'=> 'PT Adanu',
                'posisi'=> 'Leader Data Analyst',
                'mulai'=> '2023',
                'lokasi'=> 'Yogyakarta',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        PengalamanModel::insert($data);
    }
}
