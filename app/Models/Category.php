<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $table = 'danh_muc_laptop';

    protected $fillable = ['ten_danh_muc'];
}