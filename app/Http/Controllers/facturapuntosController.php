<?php

namespace SmartKet\Http\Controllers;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Models\puntos;
use Carbon\Carbon;
use SmartKet\models\almacen\terceros;
use SmartKet\models\puntos\facturapuntos;

class facturapuntosController extends Controller
{
    public function index(){
    	$fecha=Carbon::now()->format('Y-m-d');
        $date=Carbon::now()->addYears(5)->format('Y-m-d');

        $factura_id =facturapuntos::where('tipo', 1)
            ->whereIn('estado_id', [1])
            ->first();

        $terceros1 = terceros::select('id','nombres','apellido1','apellido2','nit')
            ->where('id', '=', $factura_id{'id'})
            ->first();

        return View('facturapuntos/facturaPuntosView')
        ->with('date',$date)
        ->with('fecha',$fecha)
        ->with('factura_id',$factura_id)
        ->with('terceros1',$terceros1);
    }
}
