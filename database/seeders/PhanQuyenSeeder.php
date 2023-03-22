<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phan_quyen')->insert([
            ['id'=>1,'ten'=>'Admin'],
            ['id'=>2,'ten'=>'Nhân viên'],
            ['id'=>3,'ten'=>'Nhân viên quản lý chương trình'],
            ['id'=>4,'ten'=>'Quản lý'],
            ['id'=>5,'ten'=>'Thủ kho'],
        ]);
    }
}
