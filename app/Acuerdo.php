<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
	protected $table = 'acuerdos';

	public function Point()
    {
        return $this->belongsTo('App\Punto','punto_id');
    }

    public function Element()
    {
    	return $this->belongsTo('App\Elemento','elemento_id');
    }
}