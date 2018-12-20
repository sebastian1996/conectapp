<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Elemento;
use App\Punto;
use App\Categoria;
use App\User;

class ElementoController extends Controller
{
    public function Save(Request $request)
    {
    	$data = $request->all();
    	$data['persona_id'] = User::find(Session::get('session'))->person()->first()['id'];
    	$name_file = uniqid().'.png';

        if (!file_exists('img/elementos/')) {
            mkdir("img/elementos/", 0777);
        }
    	
    	file_put_contents('img/elementos/'.$name_file, file_get_contents($data['imagen64']));

    	$data['imagen'] = $name_file;
    	
    	if (Elemento::Insert($data)) {
    		return response()->json(['status' => true, 'msg' => 'Guardado correctamente']);
    	} else {
    		return response()->json(['status' => false, 'msg' => 'Error al guardar, por favor intentelo más tarde']);
    	}
    }

    public function SearchElementsByCategories()
    {
        $Punto = Punto::find(User::find(Session::get('session'))->Point()->first()['id']);
        $arr = [];
        
        foreach ($Punto->cat_x_pun()->get() as $key => $value) {
            $arr[] = $value['categoria_id'];
        }

        $arr_second = [];

        foreach (Categoria::whereIn('id', $arr)->get() as $key => $value) {
            $arr_second[] = $value['id'];
        }

        $Elementos = Elemento::whereIn('categoria_id', $arr_second)
        ->where('estado', 'Disponible')
        ->get();

        $Final = [];

        foreach ($Elementos as $key => $value) {
            $Final[] = $value;
            $Final[$key]['persona'] = $value->person()->first();
            $Final[$key]['cantidad_'] = $value->cant()->first();
        }

        return $Final;
    }

    public function SearchElementsAvaibleByPerson()
    {
        $Elementos = Elemento::where('persona_id', User::find(Session::get('session'))->Person()->first()['id'])
        ->where('estado', 'Disponible')
        ->get();

        $Final = [];

        foreach ($Elementos as $key => $value) {
            $Final[] = $value;
            $Final[$key]['cantidad_'] = $value->cant()->first();
        }

        return $Final;
    }
}
