<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nhan_vien';
    protected $fillable = [
        'ten_dang_nhap',
        'mat_khau',
        'ho_ten',
        'ngay_sinh',
        'dien_thoai',
        'email',
        'phan_quyen_id',
    ];

     //format thời gian tại giao diện
     protected $casts=[
        'ngay_sinh' => 'datetime:d-m-Y',

    ];

    public function phan_quyen()
    {
        return $this->belongsTo(PhanQuyen::class);
    }

    public function nhap_kho()
    {
        return $this->hasMany(NhapKho::class);
    }
}
