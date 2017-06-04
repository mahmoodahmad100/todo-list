<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable;
	
	public $timestamps = false;

	public function items()
	{
		return $this->hasMany('App\Item','user_id','email');
	}
}
