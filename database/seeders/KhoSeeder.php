<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kho')->insert([
            ['id'=>1,'ten'=>'Văn phòng'],
            ['id'=>2,'ten'=>'Cộng hoà'],                 
        ]);
    }
}
