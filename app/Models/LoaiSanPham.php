<?php

namespace App\Models;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoaiSanPham extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'loai_san_pham';
    protected $fillable = [
        'ten',
    ];

    public function san_pham()
    {
        return $this->belongsToMany(SanPham::class);
    }
}
