<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Elemento extends Model
{
	protected $table = 'elementos';

	static public function Insert($values)
	{
		return DB::table('elementos')->insert([
			'nombre' => $values['nombre'],
			'descripcion' => $values['descripcion'],
			'cantidad' => $values['cantidad'],
			'precio' => $values['precio'],
			'estado' => $values['estado'],
			'imagen' => $values['imagen'],
			'persona_id' => $values['persona_id'],
			'categoria_id' => $values['categoria_id'],
			'cantidad_id' => $values['cantidad_id']
		]);
	}
}