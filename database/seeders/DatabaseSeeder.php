<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(installSeeder::class);
        $this->call(LichSeeder::class);
        $this->call(DatLichSeeder::class);
        $this->call(HoaDonSeeder::class);
        $this->call(LieutrinhSeeder::class);
        $this->call(DonHangSeeder::class);
    }
}
