<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietSanPham extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'chi_tiet_san_pham';
    protected $fillable = [
        'san_pham_id',
        'loai_san_pham_id'
    ];

}
