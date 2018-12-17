<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $table = 'personas';

	public function Elements()
	{
		return $this->hasMany('App\Elemento', 'persona_id');
	}
}