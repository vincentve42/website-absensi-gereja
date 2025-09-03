<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jemaat extends Model
{
    protected $table = 'jemaat';

    protected $fillable = ['nama_jemaat','alamat_jemaat','nomor_telepon'];

    public function AbsenAcara(): HasMany
    {   
        return $this->hasMany(AbensiAcara::class);
    }
}
