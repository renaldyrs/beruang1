<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id_role';

    protected $fillable = [
        'id_role',
        'role'
    ];

    //Relation Role to user
    public function user(){
        return $this->hasMany('App\Models\User' ,'id_role');
    }
}
