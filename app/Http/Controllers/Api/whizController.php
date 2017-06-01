<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\whizRequest;
use Whiz;
use Exception;
use File;

class whizController extends Controller
{
    public function index(){    	

    	$data = Whiz::list()->get();

    	return response()->json($data);
    }

    public function store(whizRequest $request){
    	

    	try {
    		
    		$whiz = new Whiz;
	    	$whiz->nombre = $request->nombre;
	    	$whiz->apellido = $request->apellido;
	    	$whiz->dni = $request->dni;

	    	if ($request->file('foto')->isValid()) {
	    		$file = $request->file('foto');
	    		$nombre_file = $file->getClientOriginalName();
	    		$request->foto->storeAs('images',$nombre_file,'assets'); 
		    	$whiz->foto = $nombre_file;
	    	} else{
	    		throw new Exception("Ocurrio un error al Registrar Foto.");
	    		
	    	}

	    	$whiz->fecha_nac = $request->nacimiento;
	    	$whiz->save();	

	    	if (!$whiz) {throw new Exception("Ocurrio un error al almacenar datos.");
	    	}

	    	$msj = ['message' => 'Se registro Correctamente',
	    			'id' => $whiz->id
    			   ];

	    	return response()->json($msj);

    	} catch (Exception $e) {
    		$msj = [ 'line' => $e->getLine(),
    				 'File' => $e->getFile(),
    				 'message' => $e->getMessage()
    			   ];
    		return response()->json($msj);
    	}
    }
}

