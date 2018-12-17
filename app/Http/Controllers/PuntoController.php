<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Cat_x_Pun;
use App\Punto;
use App\User;

class PuntoController extends Controller
{
    public function SaveCategoriesPrices(Request $request)
    {
    	$data = $request->all()['data'];

    	$CatPrecio = "";
    	
    	for ($i=0; $i < count($data); $i++) { 
    		$values = explode("Campo", $data[$i])[1];

    		$CatPrecio = Cat_x_Pun::where('categoria_id', explode('-', $values)[0])
    		->where('punto_id', User::find(Session::get('session'))->Point()->first()['id'] )
    		->first();

    		$CatPrecio->precio = explode('-', $values)[1];

    		$CatPrecio->save();
    	}

    	return response()->json(['status' => true, 'msg' => 'Actualizados correctamente']);
    }
}
