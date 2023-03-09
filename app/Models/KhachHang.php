<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KhachHang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='khach_hang';
    protected $fillable = [
        'ten',
    ];

    public function nhapkho()
    {
        return $this->HasMany(NhapKho::class);
    }
}
