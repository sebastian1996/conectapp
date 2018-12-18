<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Punto;
use App\Persona;
use App\User;
use App\Acuerdo;
use App\Elemento;
use App\Cat_x_Pun;

class AcuerdoController extends Controller
{
    public function Save(Request $request)
    {
    	$elemento_id = $request->all()['elemento_id'];
    	$acuerdo = new Acuerdo();
    	
    	$acuerdo->estadoGeneral = 'Pendiente';
    	$acuerdo->estadoPunto = 'En espera';
    	$acuerdo->estadoPersona = 'En espera';
    	$total = intval((Elemento::find($elemento_id)['cantidad'])*(Cat_x_Pun::where('categoria_id', Elemento::find($elemento_id)['categoria_id'])->where('punto_id', User::find(Session::get('session'))->Point()->first()['id'])->first()['precio']));
    	$acuerdo->precio = $total;
    	$acuerdo->punto_id = User::find(Session::get('session'))->Point()->first()['id'];
    	$acuerdo->elemento_id = $elemento_id;

    	$acuerdo->save();

    	$elemento = Elemento::find($elemento_id);
    	$elemento->estado = 'Negociando';
    	$elemento->save();

    	return response()->json(['status' => true, 'msg' => 'Guardado correctamente']);
    }

    public function SearchContactPointDone()
    {
    	$contactos = Acuerdo::where('punto_id', User::find(Session::get('session'))->Point()->first()['id'])
    	->where('estadoGeneral', 'Cerrado')->get();
    	foreach ($contactos as $key => $value) {
    		$contactos[$key]['elemento'] = $value->Element()->first();
    		$contactos[$key]['persona'] = $value->Element()->first()->person()->first();
    	}

    	return $contactos;
    }

    public function SearchContactPoint()
    {
    	$contactos = Acuerdo::where('punto_id', User::find(Session::get('session'))->Point()->first()['id'])
    	->where('estadoGeneral', 'Pendiente')->get();
    	foreach ($contactos as $key => $value) {
    		$contactos[$key]['elemento'] = $value->Element()->first();
    		$contactos[$key]['persona'] = $value->Element()->first()->person()->first();
    	}

    	return $contactos;
    }

    public function SearchContactPerson()
    {
    	$elementos = Persona::where('user_id', Session::get('session'))->first()->Elements()->get();
    	$list = [];
    	
    	foreach ($elementos as $key => $value) {
    		if (count($value->contac()->get()) > 0) {
    			foreach ($value->contac()->get() as $key_ => $value_) {
    				if ($value_['estadoPersona'] == 'En espera') {
    					array_push($list, array('punto' => $value_->Point()->first(), 'elemento' => $value, 'id' => $value_['id'], 'precio' => $value_['precio']));
    				}
    				
    			}
    		}
    	}

    	return $list;
    }

    public function ClosePoint(Request $request)
    {
    	$acuerdo_id = $request->all()['acuerdo_id'];
    	$acuerdo = Acuerdo::find($acuerdo_id);

    	if ($acuerdo->estadoPersona == "Cerrado") {
    		$acuerdo->estadoPunto = 'Cerrado';
    		$acuerdo->estadoGeneral = 'Cerrado';

    		$acuerdo->save();

    		$elemento = Elemento::find($acuerdo->elemento_id);
    		$elemento->estado = 'Adquirido';
    		$elemento->save();
    		
    		return response()->json(['status' => true, 'msg' => 'Acuerdo cerrado correctamente']);
    	}else{
    		return response()->json(['status' => false, 'msg' => 'La persona debe cerrar previamente el acuerdo']);
    	}
    }

    public function ClosePerson(Request$request)
    {
    	$acuerdo_id = $request->all()['acuerdo_id'];
    	$acuerdo = Acuerdo::find($acuerdo_id);

    	$acuerdo->estadoPersona = 'Cerrado';

    	$acuerdo->save();

    	return response()->json(['status' => true, 'msg' => 'Cerrado correctamente']);
    }

    public function Facture()
    {
        $contactos = Acuerdo::where('punto_id', User::find(Session::get('session'))->Point()->first()['id'])
        ->where('estadoGeneral', 'Cerrado')->get();
        foreach ($contactos as $key => $value) {
            $contactos[$key]['elemento'] = $value->Element()->first();
            $contactos[$key]['persona'] = $value->Element()->first()->person()->first();
        }

        return $contactos;
    }
}
