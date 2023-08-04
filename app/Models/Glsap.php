<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glsap extends Model
{
    use HasFactory;

    protected $table = 'glsap';
    protected $fillable = ['glsap', 'costcenter', 'namarekening'];
}
