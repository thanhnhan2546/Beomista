<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    
    protected $table = 'hoadon';
    protected $fillable = ['MAHD','MAKH','NGAYLAP','TONGTIEN','TINHTRANG','CMT'];
    public $timestamps = false;
    protected $primaryKey = 'MAHD';
    public $incrementing = false;
}
