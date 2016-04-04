<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price','photo','type_id'
    ];

    public function type(){
    	return $this->belongsTo("App\models\Type");
    }
       public function orders(){
    	return $this->belongsToMany('App\models\Order');
    }
    
}
