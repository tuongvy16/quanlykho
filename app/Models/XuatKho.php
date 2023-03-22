<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XuatKho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='xuat_kho';
    protected $fillable = [
        'kho_id',
        'hinh_thuc_id',
        'chuong_trinh_id',
        'khach_hang_id',
        'nhan_vien_xuat_id',
        'ghi_chu',
        'ngay_duyet',
        'trang_thai'
    ];

    public function kho()
    {
        return $this->belongsTo(Kho::class);
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
}

