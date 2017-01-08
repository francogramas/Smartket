<?php

namespace SmartKet\Http\Controllers\almacen\facturas;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;

use Carbon\Carbon;
use \SmartKet\models\almacen\facturas\factura;
use \SmartKet\models\almacen\facturas\facturaDetalle;
use SmartKet\models\almacen\productos\productos;
use SmartKet\models\almacen\terceros;

use Auth;
use DB;
use Session;

class pedido extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fecha=Carbon::now()->format('Y-m-d');
        $date=Carbon::now()->addYears(5)->format('Y-m-d');
        $aut=Auth::user()->id;

        $factura_id =factura::where('tipo', 4)
            ->where('estado_id', 1)
            ->where('users_id',$aut)
            ->first();

        $terceros1 = terceros::select('id','nombres','apellido1','apellido2','nit')
            ->where('id', '=', $factura_id{'tercero_id'})
            ->first();

        $totales=DB::table('facturadetalle')
        ->select(DB::raw('sum(cantidad*costo) as costoTotal, sum(cantidad*valor) as valorTotal, sum(cantidad*valor)-sum(cantidad*costo) UtilidadNeta'))
        ->where('facturadetalle.factura_id','=',$factura_id{'id'})
        ->get();

        $facturaDetalles = facturaDetalle::select('facturadetalle.id','productos.nombre','productos.codigo','facturadetalle.lote','facturadetalle.costo','facturadetalle.valor','facturadetalle.cantidad','facturadetalle.stockMin','facturadetalle.vence')->
            join('productos','productos.id','=','facturadetalle.producto_id')->
            where('facturadetalle.factura_id',$factura_id{'id'})->
            get();

        return View('almacen/facturas/facturaPedido')
        ->with('date',$date)
        ->with('fecha',$fecha)
        ->with('facturaDetalles',$facturaDetalles)
        ->with('factura_id',$factura_id)
        ->with('terceros1',$terceros1)
        ->with('aut',$aut)
        ->with('totales',$totales->toArray());
    }

    public function create()
    {
        $aut=Auth::user()->id;

        $count = factura::where('tipo', 4)
        ->where('estado_id', 1)
        ->where('users_id',$aut)
        ->count();

        if ($count>0)
        {
            $factura =factura::select('id')
            ->where('tipo', 4)
            ->where('estado_id', 1)
            ->where('users_id',$aut)
            ->first();   

            if ($factura{'id'}>0)
            {
                DB::statement('call factVenta2Invetario(?,?);',[$factura{'id'},2]);
            }
        }
        return redirect()->route('pedido.index');
    }

    public function store(Request $request)
    {
        $aut=Auth::user()->id;

        $count = factura::where('tipo', 4)
        ->where('estado_id', 1)
        ->where('users_id',$aut)
        ->count();

        if ($count==0)
        {
            factura::create($request->all());
        }

        $count1 = factura::where('tipo',4)->where('estado_id', 1)
        ->count();

        if ($count1>0)
        {
            $factura_id =factura::select('id')
            ->where('tipo', 4)
            ->where('estado_id', 1)
            ->where('users_id',$aut)
            ->first();

            $request->request->add(['factura_id' => $factura_id{'id'}]);
            facturaDetalle::create($request->all());
        }

        return redirect()->route('pedido.index');
    }

    public function show($id)
    {
           // esta funcion cancela la factura        
        $factura = factura::select('id')
        ->where('tipo', 4)
        ->where('estado_id', 1)
        ->where('users_id',Auth::user()->id)
        ->first();  

        if ($factura{'id'}>0)
        {
            DB::statement('call factVenta2Invetario(?,?);',[$factura{'id'},4]);
            Session::flash('delete','La factura fué cancelada');

        }
        return redirect()->route('pedido.index');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
