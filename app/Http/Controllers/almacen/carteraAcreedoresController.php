<?php

namespace SmartKet\Http\Controllers\almacen;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use SmartKet\models\almacen\cartera\cartera;
use SmartKet\models\almacen\cartera\estadocartera;
use SmartKet\models\almacen\cartera\tipocartera;
use DB;

class carteraAcreedoresController extends Controller
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

    	$listado=DB::select(DB::raw('select T1.*,terceros.nit,terceros.nombres, terceros.apellido1,terceros.apellido2 from  (select sum(deuda) - sum(abono) as saldo, tercero_id from cartera where tipocartera_id=2 group by tercero_id) as T1 inner join terceros on terceros.id=T1.tercero_id where T1.saldo>0'));

    	return view('almacen.cartera.carteraAcreedorView')
    	->with('acreedoresTotal',$deudaAcreedores-$abonoAcreedores)
    	->with('deudoresTotal',$deudaDedores-$abonoDedores)
    	->with('listado',$listado);
    }
}
