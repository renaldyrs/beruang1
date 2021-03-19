<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kurir extends Model
{
    use HasFactory;
    protected $table = "kurirs";
    
    protected $primaryKey = 'id_kurir';

    protected $fillable = [
        'id_kurir',
        'nama_kurir',
        'kode_kurir'
    ];
}
