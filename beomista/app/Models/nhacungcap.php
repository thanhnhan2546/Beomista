<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhacungcap extends Model
{
    use HasFactory;
    protected $table = 'nhacungcap';
    protected $fillable = ['MANCC','TENNCC','DIACHI','SDT','EMAIL'];
    public $timestamps = false;
    protected $primaryKey = 'MANCC';
    public $incrementing = false;
}
