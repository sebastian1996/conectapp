<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elemento;

class ElementoController extends Controller
{
    public function Save(Request $request)
    {
    	$data = $request->all();
    	$data['persona_id'] = '1';
    	$name_file = uniqid().'.png';
    	
    	file_put_contents('img/elementos/'.$name_file, file_get_contents($data['imagen64']));

    	$data['imagen'] = $name_file;
    	
    	if (Elemento::Insert($data)) {
    		return response()->json(['status' => true, 'msg' => 'Guardado correctamente']);
    	} else {
    		return response()->json(['status' => false, 'msg' => 'Error al guardar, por favor intentelo más tarde']);
    	}
    }
}
