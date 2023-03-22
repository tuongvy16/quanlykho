<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listNhanVien = [
            ['nhanvien1','Nhân viên 1','1997-01-19', '0928282923', 'nhanvien1@gmail.com', 1],
            ['nhanvien2','Nhân viên 2','1999-01-10', '0929928461', 'nhanvien2@gmail.com', 2],
            ['nhanvien3','Nhân viên 3','2001-08-01', '0928281238', 'nhanvien3@gmail.com', 3],
            ['nhanvien4','Nhân viên 4','2000-04-24', '0928288223', 'nhanvien4@gmail.com', 3],
            ['nhanvien5','Nhân viên 5','1999-10-01', '0922932967', 'nhanvien5@gmail.com', 2],
            ['nhanvien6','Nhân viên 6','1999-01-19', '0928288223', 'nhanvien6@gmail.com', 4],
            ['nhanvien7','Nhân viên 7','2001-02-14', '0922938223', 'nhanvien7@gmail.com', 5],
            ['nhanvien8','Nhân viên 8','1997-08-20', '0928288293', 'nhanvien8@gmail.com', 3],
            ['nhanvien9','Nhân viên 9','1996-05-01', '0922919193', 'nhanvien9@gmail.com', 4],
            ['nhanvien10','Nhân viên 10','2001-01-10', '0928298235', 'nhanvien10@gmail.com', 5],
        ];
        
        foreach($listNhanVien as $nhanVien) {
            NhanVien::create([
                'ten_dang_nhap'        => $nhanVien[0],
                'ho_ten'    => $nhanVien[1],
                'ngay_sinh'         => $nhanVien[2],
                'mat_khau'      => bcrypt('123456'),
                'dien_thoai'      => $nhanVien[3],
                'email'     => $nhanVien[4],
                'phan_quyen_id'     => $nhanVien[5]

            ]);
        }
    }
}
