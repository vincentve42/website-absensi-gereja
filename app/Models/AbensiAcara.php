<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbensiAcara extends Model
{
    protected $table = 'absensi';
    public function Jemaat() : BelongsTo
    {
        return $this->belongsTo(Jemaat::class);
    }
    public function Acara() : BelongsTo
    {
        return $this->belongsTo(Acara::class);
    }
}
