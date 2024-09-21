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
            ['keterangan' => 'Januari'],
            ['keterangan' => 'Februari'],
            ['keterangan' => 'Maret'],
            ['keterangan' => 'April'],
            ['keterangan' => 'Mei'],
            ['keterangan' => 'Juni'],
            ['keterangan' => 'Juli'],
            ['keterangan' => 'Agustus'],
            ['keterangan' => 'September'],
            ['keterangan' => 'Oktober'],
            ['keterangan' => 'November'],
            ['keterangan' => 'Desember'],
        ];

        DB::table('pembukuan')->insert($pembukuan);
    }
}
