<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_san_pham')->insert([
            ['id'=>1,'ten'=>'Tivi'],
            ['id'=>2,'ten'=>'Thiết bị'],
            ['id'=>3,'ten'=>'Tủ lạnh'],
            ['id'=>4,'ten'=>'Điện tử'],
            ['id'=>5,'ten'=>'Máy lạnh'],
            ['id'=>6,'ten'=>'Gia dụng'],
            ['id'=>7,'ten'=>'Máy xay'],
            ['id'=>8,'ten'=>'Máy quạt'],           
        ]);
    }
}
