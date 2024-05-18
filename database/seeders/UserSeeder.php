<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'=> 'Isnaeni Emi Ardiani',
            'email' => 'emiardiani@gmail.com',
            'password' => bcrypt('12345678'),
            'telepon' => '089607575812',
            'agama' => 'Islam',
            'status' => 'Belum Menikah',
            'alamat' => 'Tangkil, Pundong, Bantul, Yogyakarta',
            'tempat_lahir' => 'Bantul',
            'tanggal_lahir' => '26-07-2002',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        User::insert($data);
    }
}
