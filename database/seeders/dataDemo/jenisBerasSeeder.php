<?php

namespace Database\Seeders\dataDemo;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jenisBerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_beras = [
            ['nama' => 'Beras Putih', 'urutan' => 3],
            ['nama' => 'Beras Merah', 'urutan' => 1],
            ['nama' => 'Beras Hitam', 'urutan' => 2],
        ];

        foreach ($jenis_beras as $jenis) {
            \App\Models\JenisBeras::create($jenis);
        }
    }
}
