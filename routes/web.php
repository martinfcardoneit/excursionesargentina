<?php

use App\Http\Controllers\ExcursionesController;
use App\Http\Controllers\VistasController;
use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request;
//use Illuminate\Support\Facades\Request as Requeste ;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [VistasController::class, 'inicio']) -> name('inicio');
Route::get('/excursiones/{id}', [VistasController::class, 'excursiones']) -> name('excursiones');
Route::get('/excursion/alta', [VistasController::class, 'altaExcursion']) -> name('altaExcursion');
Route::get('/excursion/{id}', [VistasController::class, 'excursionesDetalle']) -> name('detalle');
Route::get('/ruta', [VistasController::class, 'rutasDetalle']) ->name('ruta');

Route::post('/alta', [ExcursionesController::class, 'altaExcursion']);

/*Route::post('/guardarexcursion', function (Request $request){
    session(['excursiones'=>$request->input('excursionese')]);
    return response()->json(['message'=>'Productos guardados']);});*/

Route::post('/guardarexcursion', function (Request $request){
    $nuevaExcursion= $request->input('excursionese');
    if(is_string($nuevaExcursion)){
        $nuevaEcursionDecoded=json_decode($nuevaExcursion,true);
        if (json_last_error()===JSON_ERROR_NONE){
            $nuevaExcursion=$nuevaEcursionDecoded;
        }else{
            return response()->json(['message'=>'Error la excusrion Json']);
        }
    }
    $excursiones= session('excursiones',[]);
    $excursiones[]=$nuevaExcursion;
    session(['excursiones'=>$excursiones]);
    return response()->json(['message'=>'Excursion si guardada']);});


Route::post('/eliminarexcursion', function (Request $request){
    $nombreexcursion= $request->input('nombre');
    $excursiones= session('excursiones',[]);
    $excursiones=array_filter($excursiones, function($excursion)use ($nombreexcursion){
        return $excursion ['nombre'] != $nombreexcursion; });
        $excursiones=array_values($excursiones);
        session(['excursiones'=>$excursiones]);
        return response()->json(['message'=>'Excursion Eliminada', 'excursiones' => $excursiones]);
    });


