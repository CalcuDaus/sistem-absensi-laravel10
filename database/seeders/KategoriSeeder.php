<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'izin',
            ],
            [
                'nama' => 'sakit',
            ],
            [
                'nama' => 'alpha',
            ],
        ];

        foreach ($data as $value) {
            DB::table('kategori_notifikasis')->insert($value);
        }
    }
}
