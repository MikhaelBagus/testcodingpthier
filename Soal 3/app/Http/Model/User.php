<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //
    use SoftDeletes;
    use Notifiable;
    
    protected $table = "ms_user";
    protected $primaryKey = "user_id";

    public function role(){
        return $this->belongsTo('App\Model\Role','role_id','role_id');
    }

    public function mutasi(){
        return $this->hasMany('App\Model\Mutasi','mutasi_id','mutasi_id');
    }
}