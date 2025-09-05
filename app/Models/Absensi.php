<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = ['jemaat_id','acara_id','done','status_kehadiran'];
    public function Jemaat() : BelongsTo
    {
        return $this->belongsTo(Jemaat::class);
        
    }
    public function Acara() : BelongsTo
    {
        return $this->belongsTo(Acara::class,'acara_id');
    }
}
