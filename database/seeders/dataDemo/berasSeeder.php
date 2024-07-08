<?php

namespace Database\Seeders\dataDemo;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class berasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_beras_demo = [
            [
                'jenis_beras_id' => 1,
                'user_id' => 2,
                'harga' => 20000,
                'berat' => 12,
                'deskripsi' => 'Beras merah yang sangat enak',
            ],
            [
                'jenis_beras_id' => 2,
                'user_id' => 3,
                'harga' => 25000,
                'berat' => 34,
                'deskripsi' => 'Beras hitam yang sangat enak',
            ],
            [
                'jenis_beras_id' => 3,
                'user_id' => 4,
                'harga' => 15000,
                'berat' => 11,
                'deskripsi' => 'Beras putih yang sangat enak',
            ],
        ];

        foreach ($data_beras_demo as $beras) {
            \App\Models\Beras::create($beras);
        }
    }
}
