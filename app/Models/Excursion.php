<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table= 'excursiones';
    protected $primaryKey='idexcursion';

    public $fillable= [
            'nombre',
            'situacion',
            'servicio',
            'precio',
            'idzona',
            'imagen'

    ];

    public static function alta ($datos){
        Excursion::create([
            'nombre' => $datos['nombre'],
            'situacion'=> $datos['situacion'],
            'servicio'=> $datos['servicio'],
            'precio'=> $datos['precio'],
            'idzona'=> $datos['zona'],
            'imagen'=> $datos ['img']?? 'sinimagen.jpg',

        ]); // metodo create genera una sentencia mysql
    }
}
