<?php

namespace Database\Seeders;

use App\Models\DonViTinh;
use App\Models\LoaiSanPham;
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
        $this->call([
            LoaiSanPhamSeeder::class,
            DonViTinhSeeder::class,
            NhaCungCapSeeder::class,
            KhoSeeder::class,
            HinhThucSeeder::class,
            ChuongTrinhSeeder::class,
            SanPhamSeeder::class
        ]);    
    }
}
