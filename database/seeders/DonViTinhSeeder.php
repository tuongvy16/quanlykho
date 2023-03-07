<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonViTinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('don_vi_tinh')->insert([
            ['id'=>1,'ten'=>'Cái'],
            ['id'=>2,'ten'=>'Chiếc'],                 
        ]);
    }
}
