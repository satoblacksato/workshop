<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function allowfunctions($module,$isShow=false){
	 $this->middleware("can:{$module}-index",  ['only' => ['index']]);
	 $this->middleware("can:{$module}-create", ['only' => ['create','store']]);
	 $this->middleware("can:{$module}-update", ['only' => ['edit','update']]);
	 $this->middleware("can:{$module}-delete", ['only' => ['delete']]);
	 if($isShow){
	  	$this->middleware("can:{$module}-show",['only' => ['show']]);
	 }
    }
}
