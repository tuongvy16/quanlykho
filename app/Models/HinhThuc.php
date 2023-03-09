<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HinhThuc extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='hinh_thuc';
    protected $fillable = [
        'ten',
    ];

    public function nhapkho()
    {
        return $this->HasMany(NhapKho::class);
    }
}
