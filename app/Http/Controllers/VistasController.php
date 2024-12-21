<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\Zona;
use Illuminate\Http\Request;

class VistasController extends Controller
{
    // carga de inicio
    public function inicio (){
        return view('inicio');
    }

    public function excursiones ($id){
       // if ($id==1){dd("very much");}
        //$datos['zona']=$id;
        $datos['excursiones']=Excursion::all(); 
        $datos['excursionesContratadas']= session('excursiones',[]);
        //dd($datos['excursionesContratadas']);
        //dd($datos['excursiones']->toArray());
        $datos['zonas']=Zona::all();

        $datos['excursionesZona']=Excursion::where('idzona',$id)->get();

        return view('excursiones')->with($datos);
    }

    public function excursionesDetalle ($id){
        $datos['excursion']=Excursion::find($id);
        $datos['excursionesContratadas']= session('excursiones',[]);
        //return response()->json($excursion,200);
        return view('detalle')->with($datos);
    }

    public function altaExcursion (){
        $datos ['zonas'] = Zona::all();
        return view('alta') ->with ($datos);
    }

    public function rutasDetalle (){
        $arrayExcur= session('excursiones');
        
        foreach ($arrayExcur as $excursion){
            if (is_string($excursion)){
            $excursion=json_decode($excursion, true);}
            //print_r($excursion);
        } unset ($excursion);
      
        //print_r($arrayExcur);
        return view('ruta', ['arrayExcur'=> $arrayExcur]);
    }
    
}
