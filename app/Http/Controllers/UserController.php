<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{
    public function CheckSession()
    {
        if(Session::get('session')) {
            echo Session::get('session');
        } else {
            echo "No hay";
        }
    }

    public function SingIn(Request $request)
    {
    	$User = $request->all();    	
    	
    	$Model = User::ValidateUserCredentials($User['email']);
    	
    	if (Hash::check($User['password'], $Model['password'])){
    		
    		if ($Model->person()->first()['id']) {
    			$type = 'Persona';
    		} else {
    			$type = 'Punto';
    		}

            Session::put('session', $Model['id']);
    		
    		return response()->json(['status' => true, 'typeData' => $type]);
		}

		return response()->json(['status' => false]);
    }

    public function SingOut()
    {
        Session::remove('session');
        return redirect('/');
    }
}
