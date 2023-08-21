<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ppab extends Model
{
    use HasFactory;

    protected $table = 'ppab';
    protected $fillable = ['glsap_id', 'jenis_pekerjaan'];
    protected $with = ['glsap'];

    public function glsap(): BelongsTo
    {
        return $this->belongsTo(Glsap::class, "glsap_id", 'id');
    }
}
