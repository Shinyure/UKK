<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;

class PembukuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pembukuan = [
            ['bulan' => 'Januari'],
            ['bulan' => 'Februari'],
            ['bulan' => 'Maret'],
            ['bulan' => 'April'],
            ['bulan' => 'Mei'],
            ['bulan' => 'Juni'],
            ['bulan' => 'Juli'],
            ['bulan' => 'Agustus'],
            ['bulan' => 'September'],
            ['bulan' => 'Oktober'],
            ['bulan' => 'November'],
            ['bulan' => 'Desember'],
        ];

        DB::table('pembukuan')->insert($pembukuan);
    }
}
