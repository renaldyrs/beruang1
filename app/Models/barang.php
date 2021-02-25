<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
 
    protected $fillable = ['file','nama','id_category','harga','stock','keterangan'];
    public function role(){
        return $this->belongsTo('App\Models\category','id');
    }
}
