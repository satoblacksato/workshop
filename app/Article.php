<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Article extends Model
{
	use SoftDeletes;

	protected $table="articles";

    protected 
      $fillable=['name','description','user_id'];
}
