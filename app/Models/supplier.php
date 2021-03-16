<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = "suplier";
 
    protected $primaryKey = 'id_suplier';

    protected $fillable = ['id_suplier','nama_suplier','id_kota','id_provinsi','alamat'];
    // public function role(){
    //     return $this->belongsTo('App\Models\category','id');
    // }
}
