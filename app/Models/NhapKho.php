<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhapKho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='nhap_kho';
    protected $fillable = [
        'kho_id',
        'nha_cung_cap_id',
        'hinh_thuc_id',
        'chuong_trinh_id',
        'khach_hang_id',
        'nhan_vien_nhap_id',
        'ghi_chu',
        'ngay_duyet',
        'trang_thai'
    ];

    public function kho()
    {
        return $this->belongsTo(Kho::class);
    }

    public function nhacungcap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function hinhthuc()
    {
        return $this->belongsTo(HinhThuc::class);
    }

    public function chuongtrinh()
    {
        return $this->belongsTo(ChuongTrinh::class);
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class);
    }
}
