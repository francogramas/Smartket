<?php

namespace SmartKet\Http\Controllers\almacen;

use Illuminate\Http\Request;
use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use SmartKet\models\almacen\cartera\cartera;
use SmartKet\models\almacen\cartera\estadocartera;
use SmartKet\models\almacen\cartera\tipocartera;
use DB;

class carteraController extends Controller
{
    public function index(){
    	$deudaDedores=cartera::where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->sum('deuda');

    	$abonoDedores=cartera::where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->sum('abono');

    	$deudaAcreedores=cartera::where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->sum('deuda');

    	$abonoAcreedores=cartera::where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->sum('abono');

    	$listado=DB::select(DB::raw('select T1.*,terceros.nit,terceros.nombres, terceros.apellido1,terceros.apellido2 from  (select sum(deuda) - sum(abono) as saldo, tercero_id from cartera where tipocartera_id=1 group by tercero_id) as T1 inner join terceros on terceros.id=T1.tercero_id where T1.saldo>0'));

    	return view('almacen.cartera.carteraView')
    	->with('acreedoresTotal',$deudaAcreedores-$abonoAcreedores)
    	->with('deudoresTotal',$deudaDedores-$abonoDedores)
    	->with('listado',$listado);
    }

    public function detalleAbonos($tercero_id,$tipocartera_id){
    	
    	$cartera=cartera::where('tercero_id',$tercero_id)
    	->where('tipocartera_id',$tipocartera_id)
    	->orderBy('created_at','DESC')
    	->get();

    	$deuda=cartera::where('tercero_id',$tercero_id)
    	->where('tipocartera_id',$tipocartera_id)
    	->sum('deuda');

    	$abono=cartera::where('tercero_id',$tercero_id)
    	->where('tipocartera_id',$tipocartera_id)
    	->sum('abono');

    	$saldo=$deuda-$abono;
    	
    	return view('almacen.cartera.carteraDetalleView')
    	->with('cartera',$cartera)
    	->with('saldo',$saldo);
    }

    public function consolidado($tipocartera_id){
    	$deudaDedores=cartera::where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->sum('deuda');

    	$abonoDedores=cartera::where('tipocartera_id',1)
    	->where('estadocartera_id',1)
    	->sum('abono');

    	$deudaAcreedores=cartera::where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->sum('deuda');

    	$abonoAcreedores=cartera::where('tipocartera_id',2)
    	->where('estadocartera_id',1)
    	->sum('abono');

    	$listado=DB::select(DB::raw('select T1.*,terceros.nit,terceros.nombres, terceros.apellido1,terceros.apellido2 from  (select sum(deuda) - sum(abono) as saldo, tercero_id from cartera where tipocartera_id=' . $tipocartera_id . ' group by tercero_id) as T1 inner join terceros on terceros.id=T1.tercero_id where T1.saldo>0'));

    	return view('almacen.cartera.carteraConsolidadoView')
    	->with('acreedoresTotal',$deudaAcreedores-$abonoAcreedores)
    	->with('deudoresTotal',$deudaDedores-$abonoDedores)
    	->with('listado',$listado);
    }

    public function store(Request $request){
    	if ($request->ajax()){
    		cartera::create($request->all());    	
    	}
    }
}
