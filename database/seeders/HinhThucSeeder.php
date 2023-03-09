<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhThucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hinh_thuc')->insert([
            ['id'=>1,'ten'=>'Quà tặng'],
            ['id'=>2,'ten'=>'Logictic'],                 
        ]);
    }
}
