<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonViTinh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='don_vi_tinh';
    protected $fillable = [
        'ten',
    ];

    public function san_pham()
    {
        return $this->HasMany(SanPham::class);
    }
}
