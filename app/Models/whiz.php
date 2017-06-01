<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class whiz extends Model
{
    protected $hidden = ['deleted_at'];
    

    public function scopeList($query){
    	return $query;
    }
}
