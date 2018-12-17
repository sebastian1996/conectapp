<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Categoria;
use App\Punto;
use App\User;

class CategoriaController extends Controller
{
    public function GetAll()
    {
    	return Categoria::all();
    }

    public function CategoriesForPoint()
    {
    	$Punto = Punto::find(User::find(Session::get('session'))->Point()->first()['id']);
    	$arr = [];
        $precios = [];
        
        foreach ($Punto->cat_x_pun()->get() as $key => $value) {
            $arr[] = $value['categoria_id'];
            $precios[] = $value['precio'];
        }

        $arr_second = [];

        foreach (Categoria::whereIn('id', $arr)->get() as $key => $value) {
            $arr_second[] = $value;
            $arr_second[$key]['precio'] = $precios[$key];
        }

        return $arr_second;
    }
}
