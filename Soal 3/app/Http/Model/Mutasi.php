<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutasi extends Model
{
    protected $table = "trs_mutasi";
    protected $primaryKey = "mutasi_id";

    use SoftDeletes;
    public function user(){
    	return $this->belongsTo('App\Model\User','user_id','user_id');
    }
}