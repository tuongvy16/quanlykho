<?php

namespace App\Models;

use App\Models\XuatKho;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='kho';
    protected $fillable = [
        'ten',
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
