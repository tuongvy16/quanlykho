<?php

namespace App\Models;

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
}
