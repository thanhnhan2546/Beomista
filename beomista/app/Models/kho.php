<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kho extends Model
{
    use HasFactory;
    protected $table = 'kho';
    protected $fillable = ['MASP', 'MANCC', 'HSD_SP', 'SLCON'];
    public $timestamps = false;
    protected $primaryKey = 'MASP';
    public $incrementing = false;
}
