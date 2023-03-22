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

    public function nha_cung_cap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function hinh_thuc()
    {
        return $this->belongsTo(HinhThuc::class);
    }

    public function chuong_trinh()
    {
        return $this->belongsTo(ChuongTrinh::class);
    }

    public function khach_hang()
    {
        return $this->belongsTo(KhachHang::class);
    }

    public function nhan_vien()
    {
        return $this->belongsTo(NhanVien::class);
    }

    public function chi_tiet_phieu_nhap()
    {
        return $this->HasMany(ChiTietPhieuNhap::class);
    }
}
