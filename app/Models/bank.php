<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    use HasFactory;

    protected $table = 'banks';

    protected $primaryKey = 'id_bank';

    protected $fillable = [
        'no_rekening',
        'nama_bank'
    ];

}
