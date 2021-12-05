<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $fillable = ['MAKH', 'HOKH','TENKH', 'GIOITINH', 'SDT','EMAIL'];
    public $timestamps = false;
    protected $primaryKey = 'MAKH';
    public $incrementing = false;
}
