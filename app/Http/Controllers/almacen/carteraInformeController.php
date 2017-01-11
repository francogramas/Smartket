<?php

namespace SmartKet\Http\Controllers\almacen;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use SmartKet\models\almacen\cartera\cartera;
use SmartKet\models\almacen\cartera\estadocartera;
use SmartKet\models\almacen\cartera\tipocartera;
use SmartKet\models\almacen\terceros;
use DB;

class carteraInformeController extends Controller
{
    public function index(){
    	$deudaDeudores=0;
    	$abonoDeudores=0;
    	$deudaAcreedores=0;
    	$abonoAcreedores=0;
    	$fechai='';
    	$fechaf='';


    	$carteraDeudores=cartera::
    	select('cartera.created_at','cartera.deuda','cartera.abono','terceros.nombres','terceros.apellido1','terceros.apellido2')
    	->join('terceros','cartera.tercero_id','=','terceros.id')
    	->where('cartera.tipocartera_id',1)
    	->where('cartera.id',0)
    	->get();

    	$carteraAcreedores=cartera::select('cartera.created_at','cartera.deuda','cartera.abono','terceros.nombres','terceros.apellido1','terceros.apellido2')
    	->join('terceros','cartera.tercero_id','=','terceros.id')
    	->where('cartera.tipocartera_id',2)
    	->where('cartera.id',0)
    	->get();

    	return view('almacen.cartera.carteraInformeView')
    	->with('deudaDeudores',$deudaDeudores)
    	->with('deudaAcreedores',$deudaAcreedores)
    	->with('abonoDeudores',$abonoDeudores)
    	->with('abonoAcreedores',$abonoAcreedores)
    	->with('carteraDeudores',$carteraDeudores)
    	->with('carteraAcreedores',$carteraAcreedores)
    	->with('fechai',$fechai)
    	->with('fechaf',$fechaf);

    }
    public function store(Request $request){
    	$fechai=$request{'txtfechai'};
    	$fechaf=$request{'txtfechaf'};

    	$deudaDeudores=cartera::where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->whereBetween('created_at',[$fechai,$fechaf])
    	->sum('deuda');

    	$abonoDeudores=cartera::where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->whereBetween('created_at',[$fechai,$fechaf])
    	->sum('abono');

    	$deudaAcreedores=cartera::where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->whereBetween('created_at',[$fechai,$fechaf])
    	->sum('deuda');

    	$abonoAcreedores=cartera::where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->whereBetween('created_at',[$fechai,$fechaf])
    	->sum('abono');

    	$carteraDeudores=cartera::select('cartera.created_at','cartera.deuda','cartera.abono','terceros.nombres','terceros.apellido1','terceros.apellido2')
    	->join('terceros','cartera.tercero_id','=','terceros.id')
    	->where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->whereBetween('cartera.created_at',[$fechai,$fechaf])
    	->get();

    	$carteraAcreedores=cartera::select('cartera.created_at','cartera.deuda','cartera.abono','terceros.nombres','terceros.apellido1','terceros.apellido2')
    	->join('terceros','cartera.tercero_id','=','terceros.id')
    	->where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->whereBetween('cartera.created_at',[$fechai,$fechaf])
    	->get();

    	return view('almacen.cartera.carteraInformeView')
    	->with('deudaDeudores',$deudaDeudores)
    	->with('deudaAcreedores',$deudaAcreedores)
    	->with('abonoDeudores',$abonoDeudores)
    	->with('abonoAcreedores',$abonoAcreedores)
    	->with('carteraDeudores',$carteraDeudores)
    	->with('carteraAcreedores',$carteraAcreedores)
    	->with('fechai',$fechai)
    	->with('fechaf',$fechaf);
    }
}