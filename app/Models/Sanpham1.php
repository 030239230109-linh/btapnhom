<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham1 extends Model
{
    use HasFactory;

    protected $table = 'san_pham';

    protected $fillable = [
        'tieu_de',
        'gia',
        'hinh_anh',
        'id_danh_muc',
    ];
}