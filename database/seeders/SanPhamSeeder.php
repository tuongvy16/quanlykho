<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('san_pham')->insert([
            ['id'=>1,'ten'=>'Tivi SamSung','so_luong_xuat'=>10,'so_luong_ton'=>20,'tong_so_luong'=>30,'don_vi_tinh_id'=>1],
            ['id'=>2,'ten'=>'Máy quạt Xiaomi','so_luong_xuat'=>20,'so_luong_ton'=>20,'tong_so_luong'=>40,'don_vi_tinh_id'=>2],
            ['id'=>3,'ten'=>'Tủ lạnh LG','so_luong_xuat'=>10,'so_luong_ton'=>10,'tong_so_luong'=>20,'don_vi_tinh_id'=>1],
            ['id'=>4,'ten'=>'Máy lạnh Panasonic','so_luong_xuat'=>15,'so_luong_ton'=>15,'tong_so_luong'=>30,'don_vi_tinh_id'=>1],
            ['id'=>5,'ten'=>'Tivi LG','so_luong_xuat'=>10,'so_luong_ton'=>20,'tong_so_luong'=>30,'don_vi_tinh_id'=>2],
            ['id'=>6,'ten'=>'Máy giặt SamSung','so_luong_xuat'=>15,'so_luong_ton'=>20,'tong_so_luong'=>35,'don_vi_tinh_id'=>2],
        ]);
    }
}
