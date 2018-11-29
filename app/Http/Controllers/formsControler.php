<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formsControler extends Controller
{

	public function index(){
		$listaFormularios = DB::table('formatos')->where('idEstado',0)->get();
	   	$title = 'Lista de Formatos Activos';
	    return view('formulariosList',compact('listaFormularios','title'));
	}

	public function detalleFrm($id){

		$preguntas = DB::table('formatosDetalle')
		    ->select('formatosTiposPreguntas.pregunta',
		    	'formatosTiposPreguntas.idPregunta',
				'formatosTiposPreguntas.idFormato')

		    ->join('formatosTiposPreguntas','formatosTiposPreguntas.idFormato',
		    	'=','formatosDetalle.idFormato')

		    ->where('formatosDetalle.idFormato', $id)
		    ->distinct()
		    ->get();

		//dd($preguntas);

	   	$title = "Lista de preguntas para el formato # $id";
	    return view('formulariosDetalle',compact('preguntas','listVestables','title'));
	}

	public function addRespuesta(){

	    $data=request()->all();
	    //dd($data);
	    $usr=rand(1,150);

	    for($i=1; $i<=$data['recorrido']; $i++){

	    	$id = DB::table('formatosRespuesta')->insert(
	    		[
	    		'idFormato' => $data['idFormato'],
	    		'idPregunta' => $data["idPregunta$i"],
	    		'respuesta' => $data["respuesta$i"],
	    		'funcionarioResponde' => $usr,
	    		'fechaRespuesta' => date('Y-m-d H:i:s')
	    		]
			);
			$id = DB::getPdo()->lastInsertId();
		}
		return redirect('/registroOkMessage');
	}

	public function registroOk(){
		$title = 'Registro Exitoso';
    	return view('registroOk',compact('title'));
	}

	public function respuestas(){

		$respuestas = DB::table('formatosRespuesta')
	    ->select('formatosRespuesta.respuesta',
	    	'formatosRespuesta.funcionarioResponde',
			'formatosRespuesta.fechaRespuesta',
            'formatos.nombreFormato',
            'formatosTiposPreguntas.pregunta')

	    ->join('formatos','formatos.idFormato',
	    	'=','formatosRespuesta.idformato')

	    ->join("formatosTiposPreguntas",function($join){
           	$join->on("formatosTiposPreguntas.idPregunta","=","formatosRespuesta.idPregunta")
                ->on("formatosTiposPreguntas.idFormato","=","formatosRespuesta.idFormato");
        })

	    ->get();

		//dd($respuestas);

	   	$title = "Lista de respuestas";
	    return view('formularioRespuestas',compact('respuestas','title'));

	}

	

	
}
