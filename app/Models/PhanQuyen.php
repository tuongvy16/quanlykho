<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhanQuyen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'phan_quyen';
    protected $fillable = [
        'ten'
    ];

    public function nhan_vien()
    {
        return $this->HasMany(NhanVien::class);
    }
}
