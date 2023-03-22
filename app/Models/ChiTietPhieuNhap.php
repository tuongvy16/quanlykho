<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietPhieuNhap extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'chi_tiet_phieu_nhap';
    protected $fillable = [
        'san_pham_id',
        'phieu_nhap_id',
        'loai_san_pham_id',
        'don_vi_tinh_id',
        'han_su_dung',
        'so_luong',        
    ];

    public function nhap_kho()
    {
        return $this->belongsTo(NhapKho::class);
    }


}
