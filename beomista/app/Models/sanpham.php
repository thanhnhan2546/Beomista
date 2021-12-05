<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = ['MASP', 'TENSP', 'DVTINH','DONGIA','MALOAI','MOTA','ANH','NGAYLAP','SLBAN'];
    public $timestamps = false;
    protected $primaryKey = 'MASP';
    public $incrementing = false;
    public function scopeSearch($query)
    {
        # code...
        if($key =  request()->key){
            $query = $query->where('TENSP', 'like', '%'.$key.'%');
        }
    }
    public function scopeCate($query){
        if($cate= request()->cate){
            $query = $query->where('MALOAI', 'like', '%'.$cate.'%');
        }
    }
    public function scopePrice($query){
        if($min= request()->min ){
            $query = $query->where('DONGIA', '>', '%'.$min.'%');
        }
    }
}

