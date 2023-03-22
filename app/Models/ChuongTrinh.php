<?php

namespace App\Models;

use App\Models\XuatKho;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChuongTrinh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='chuong_trinh';
    protected $fillable = [
        'ten',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        
    ];
    
    //format thời gian tại giao diện
    protected $casts=[
        'ngay_bat_dau' => 'datetime:d-m-Y',
        'ngay_ket_thuc' => 'datetime:d-m-Y',

    ];

    public function nhap_kho()
    {
        return $this->HasMany(NhapKho::class);
    }

    public function xuat_kho()
    {
        return $this->HasMany(XuatKho::class);
    }

}
