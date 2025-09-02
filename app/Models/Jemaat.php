<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = 'jemaat';

    protected $fillable = ['nama_jemaat','alamat_jemaat','nomor_telepon'];
}
