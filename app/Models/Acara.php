<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acara extends Model
{
    protected $table = "acara";

    protected $fillable = ['nama_acara','tanggal_acara'];

    

    public function AbsenAcara(): HasMany
    {   
        return $this->hasMany(AbensiAcara::class);
    }
}
