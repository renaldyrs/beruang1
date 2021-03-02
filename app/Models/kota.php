<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $guarded = [];

    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'id_provinsi',
        'nama_kota'
    ];
}
