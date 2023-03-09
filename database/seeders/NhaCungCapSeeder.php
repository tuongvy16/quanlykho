<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nha_cung_cap')->insert([
            ['id'=>1,'ten'=>'Nhà cung cấp 1','dien_thoai'=>'0987286888'],
            ['id'=>2,'ten'=>'Nhà cung cấp 2','dien_thoai'=>'0992912022'],
            ['id'=>3,'ten'=>'Nhà cung cấp 3','dien_thoai'=>'0987922722'],
            ['id'=>4,'ten'=>'Nhà cung cấp 4','dien_thoai'=>'0987278153'],
            ['id'=>5,'ten'=>'Nhà cung cấp 5','dien_thoai'=>'0989282719'],
        ]);
    }
}
