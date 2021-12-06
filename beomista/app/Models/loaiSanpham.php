<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaiSanpham extends Model
{
    use HasFactory;
    protected $table = 'loaisanpham';
    protected $fillable = ['MALOAI', 'TENLOAI'];
    public $timestamps = false;
    protected $primaryKey = 'MALOAI';
    public $incrementing = false;
}
