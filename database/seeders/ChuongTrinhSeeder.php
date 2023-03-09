<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuongTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuong_trinh')->insert([
            ['id'=>1,'ten'=>'Chương Trình 1','ngay_bat_dau'=>'2022-1-1','ngay_ket_thuc'=>'2023-4-3'],
            ['id'=>2,'ten'=>'Chương Trình 2','ngay_bat_dau'=>'2022-2-2','ngay_ket_thuc'=>'2023-4-3'],
            ['id'=>3,'ten'=>'Chương Trình 3','ngay_bat_dau'=>'2022-2-2','ngay_ket_thuc'=>'2023-4-3'],
            ['id'=>4,'ten'=>'Chương Trình 4','ngay_bat_dau'=>'2022-2-2','ngay_ket_thuc'=>'2023-4-3'],
            ['id'=>5,'ten'=>'Chương Trình 5','ngay_bat_dau'=>'2022-2-2','ngay_ket_thuc'=>'2023-4-3'],
        ]);
    }
}
