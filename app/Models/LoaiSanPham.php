<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiSanPham extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'loai_san_pham';
    protected $fillable = [
        'ten',
    ];
}
