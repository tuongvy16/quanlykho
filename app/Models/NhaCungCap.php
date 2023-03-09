<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhaCungCap extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='nha_cung_cap';
    protected $fillable = [
        'ten',
        'dien_thoai'
    ];

    public function nhapkho()
    {
        return $this->HasMany(NhapKho::class);
    }
}
