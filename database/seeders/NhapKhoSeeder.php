<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhapKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhap_kho')->insert([
            ['id'=>1,'kho_id'=>1,'nha_cung_cap_id'=>2,'hinh_thuc_id'=>3,'chuong_trinh_id'=>1,'khach_hang_id'=>2,'nhan_vien_nhap_id'=>1,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>2,'kho_id'=>2,'nha_cung_cap_id'=>3,'hinh_thuc_id'=>3,'chuong_trinh_id'=>2,'khach_hang_id'=>3,'nhan_vien_nhap_id'=>2,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>3,'kho_id'=>1,'nha_cung_cap_id'=>1,'hinh_thuc_id'=>1,'chuong_trinh_id'=>3,'khach_hang_id'=>5,'nhan_vien_nhap_id'=>3,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>4,'kho_id'=>1,'nha_cung_cap_id'=>3,'hinh_thuc_id'=>2,'chuong_trinh_id'=>4,'khach_hang_id'=>3,'nhan_vien_nhap_id'=>2,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>5,'kho_id'=>2,'nha_cung_cap_id'=>4,'hinh_thuc_id'=>1,'chuong_trinh_id'=>5,'khach_hang_id'=>4,'nhan_vien_nhap_id'=>1,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>6,'kho_id'=>2,'nha_cung_cap_id'=>2,'hinh_thuc_id'=>1,'chuong_trinh_id'=>5,'khach_hang_id'=>1,'nhan_vien_nhap_id'=>3,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>7,'kho_id'=>1,'nha_cung_cap_id'=>1,'hinh_thuc_id'=>3,'chuong_trinh_id'=>3,'khach_hang_id'=>1,'nhan_vien_nhap_id'=>5,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],
            ['id'=>8,'kho_id'=>2,'nha_cung_cap_id'=>3,'hinh_thuc_id'=>1,'chuong_trinh_id'=>2,'khach_hang_id'=>4,'nhan_vien_nhap_id'=>7,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],           
            ['id'=>9,'kho_id'=>1,'nha_cung_cap_id'=>1,'hinh_thuc_id'=>2,'chuong_trinh_id'=>4,'khach_hang_id'=>3,'nhan_vien_nhap_id'=>4,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],           
            ['id'=>10,'kho_id'=>2,'nha_cung_cap_id'=>5,'hinh_thuc_id'=>1,'chuong_trinh_id'=>1,'khach_hang_id'=>2,'nhan_vien_nhap_id'=>9,'ghi_chu'=>null,'ngay_duyet'=>null,'trang_thai'=>0],           
        ]);
    }
}
