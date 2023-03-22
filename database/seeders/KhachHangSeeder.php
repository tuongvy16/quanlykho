<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khach_hang')->insert([
            ['id'=>1,'ten'=>'Khách Hàng 1'],
            ['id'=>2,'ten'=>'Khách Hàng 2'],                 
            ['id'=>3,'ten'=>'Khách Hàng 3'],                 
            ['id'=>4,'ten'=>'Khách Hàng 4'],                 
            ['id'=>5,'ten'=>'Khách Hàng 5'],                 
        ]);
    }
}
