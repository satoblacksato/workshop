<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Article extends Model
{
	use SoftDeletes;

	protected $table="articles";

    protected 
      $fillable=['name','description','user_id'];


    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }


    protected static function boot(){

 		static::creating(function ($model) {
         	$model->ip=request()->ip();
        });

        static::updating(function ($model) {

         	$model->ip=request()->ip();
        });

    	parent::boot();
    }

}
