<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThongKeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HoaDonSeeder::class);
        $this->call(DonHangSeeder::class);
        $this->call(DatLichSeeder::class);
    }
}
