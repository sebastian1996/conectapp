<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
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
    		
    		return response()->json(['status' => true, 'typeData' => $type]);
		}

		return response()->json(['status' => false]);
    }

    public function SingOut()
    {
        
    }
}
