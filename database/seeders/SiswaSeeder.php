<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('siswas')->insert([
                'nis' => Str::random(10),
                'nama' => '01' . Str::random(10),
                'gelombang' => 1,
                'instruktur_id' => 1,
                'sekolah_id' => 1,
                'jurusan_id' => 2,
                'periode_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
