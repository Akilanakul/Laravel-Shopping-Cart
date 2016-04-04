<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function products(){
    	return $this->hasMany("App\models\Product");
    }
}
