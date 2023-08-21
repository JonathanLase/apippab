<?php

namespace App\Models;

// use App\Models\Glsap;
use App\Models\ppab;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Glsap extends Model
{
    use HasFactory;

    protected $table = 'glsap';
    protected $fillable = ['glsap', 'costcenter', 'namarekening'];

    public function ppab()
    {
        return $this->hasOne(ppab::class, 'glsap_id', 'id');
    }
}
