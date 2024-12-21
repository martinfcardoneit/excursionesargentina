<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExcursionesController extends Controller
{
    //
    public function altaExcursion(Request $request){
        //recupero los datos
        $datosFormulario = $request->all();
        $imagenExcursion=$request->file('img');
        //dd($datosFormulario);
        //validar datos
        $reglas = [
            'zona' => 'required',
            'nombre' =>'required|max:60|unique:excursiones,nombre',
            'situacion' =>'required|max:380',
            'servicio' =>'required|max:560',
            'precio' => 'required|min:0',];

        $mensajes= [
            'zona.required' => 'Zona excursión obigatoria',
            'nombre.required' => 'Nombre excursión obigatorio',
            'nombre.unique' => 'Nombre de excursión ya existente',
            'situacion.required' =>'Situación excursión obigatorio',
            'situacion.max' => 'Maximo 180 caracteres',
            'servicio.required' => 'Servicio excursión obigatorio',
            'servicio.max' => 'Maximo 560 caracteres',
            'precio.required' => 'Precio excursión obigatorio',
            'precio.min' => 'Precio debe ser mayor a 0',
            
        ];

        $validator = Validator::make($datosFormulario, $reglas, $mensajes); // (estructura obligatoria (request a validar, reglas, mensajes))
        if ($validator->fails()){
            //dd($datosFormulario);
            return redirect()->route('altaExcursion')->withErrors($validator)->withInput();
        };

        //mover la imagen a carpeta public
        if($imagenExcursion){ 
            $datosFormulario['img']=$imagenExcursion->getClientOriginalName();

            Storage::putFileAs('',$imagenExcursion, $datosFormulario['img']); //es necesario cambiar la ruta por defecto desde config/filesystems.pehacpe linea 35
        } else { $datosFormulario['img']='sinportada.jpg';}

        //akta de huego usando la base de datos del modelo
        if(!$datosFormulario ['img']) $datosFormulario['img']='sinportada.jpg';
        Excursion::alta($datosFormulario);

        $datos['mensaje']= "Alta de excursion efectuada";
        //Excursion::alta ($datosFormulario);
        return redirect()->route ('altaExcursion')->with('success', $datos);

    }
}
