<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = "acara";

    protected $fillable = ['nama_acara','tanggal_acara'];
}
