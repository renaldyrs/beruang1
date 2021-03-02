<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $guarded = [];

    protected $table = 'provinsi';

    protected $primaryKey = 'id_provinsi';

    protected $fillable = [
        'nama_provinsi'
    ];
    public function Kota(){
        return $this->hasMany('App\Models\Kota','id_provinsi');
    }
}
