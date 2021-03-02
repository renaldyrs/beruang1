<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
 
    protected $fillable = ['id','id_category','file','nama','harga','stock','keterangan'];
}
