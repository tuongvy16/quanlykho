<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='san_pham';
    protected $fillable=[
        'ten',
        'don_vi_tinh_id',
    ];

    public function don_vi_tinh()
    {
        return $this->belongsTo(DonViTinh::class);
    }

    public function loai_san_pham()
    {
        return $this->belongsToMany(LoaiSanPham::class);
    }
}
