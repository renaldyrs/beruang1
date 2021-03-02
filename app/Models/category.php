<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = "category";
 
    protected $fillable = ['id','nama'];
    public function user(){
        return $this->hasMany('App\Models\barang' ,'id_category');
    }
}
