<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $fillable = ['MANV', 'HONV','TENNV', 'GIOITINH', 'NGSINH','DCHI','SDT','EMAIL'];
    public $timestamps = false;
    protected $primaryKey = 'MANV';
    public $incrementing = false;
}
