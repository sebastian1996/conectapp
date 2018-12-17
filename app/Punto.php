<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
	protected $table = 'puntos';

	public function cat_x_pun()
	{
		return $this->hasMany('App\Cat_x_Pun', 'punto_id');
	}
}