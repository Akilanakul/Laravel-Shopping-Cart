<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function User(){
    	return $this->belongsTo("App\models\User");
    }
    public function products(){
    	return $this->belongsToMany('App\models\Product')->withPivot('quantity');
    }
}

