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
use DB;
use Auth;


class venta extends Controller
{
    public function index()
    {
        $fecha=Carbon::now()->format('Y-m-d');
        $date=Carbon::now()->addYears(5)->format('Y-m-d');
        $aut=Auth::id();

        $factura_id =factura::where('tipo', 1)
            ->whereIn('estado_id', [1])
            ->first();

        $terceros1 = terceros::select('id','nombres','apellido1','apellido2','nit')
            ->where('id', '=', $factura_id{'tercero_id'})
            ->first();

        $facturaDetalles = facturaDetalle::select('facturadetalle.id','productos.nombre','productos.codigo','facturadetalle.lote','facturadetalle.costo','facturadetalle.valor','facturadetalle.cantidad','facturadetalle.stockMin','facturadetalle.vence')->
            join('productos','productos.id','=','facturadetalle.producto_id')->
            where('facturadetalle.factura_id',$factura_id{'id'})->
            get();

        $totales=DB::table('facturadetalle')
        ->select(DB::raw('sum(cantidad*costo) as costoTotal, sum(cantidad*valor) as valorTotal, sum(cantidad*valor)-sum(cantidad*costo) UtilidadNeta'))
        ->where('facturadetalle.factura_id','=',$factura_id{'id'})
        ->first();

        return View('almacen/facturas/facturaVenta')
        ->with('date',$date)
        ->with('fecha',$fecha)
        ->with('facturaDetalles',$facturaDetalles)
        ->with('factura_id',$factura_id)
        ->with('totales',$totales)
        ->with('aut',$aut)
        ->with('terceros1',$terceros1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // esta funcion finaliza la factura y lleva todos los datos de la factura al inventario        
        $count = factura::where('tipo', 1)
        ->where('estado_id', 1)
        ->where('users_id',Auth::user()->id)
        ->count();

        if ($count>0)
        {
            $factura_id =factura::select('id')
            ->where('tipo', 6)
            ->where('estado_id', 1)
            ->where('users_id',Auth::user()->id)
            ->first();
            DB::statement('call fact2invent('.$factura_id{'id'}.');');
        }
        return redirect()->route('venta.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Esta funcion almacena el detalle de cada una de las facturas, cada producto en el lstado de fatcuras
        $count = factura::where('tipo', 1)
        ->whereIn('estado_id', [1])
        ->where('users_id',Auth::user()->id)
        ->count();

        if ($count==0)
        {
            factura::create($request->all());
        }

        $count1 = factura::where('tipo',1)
        ->where('estado_id', 1)
        ->where('users_id',Auth::user()->id)
        ->count();

        if ($count1>0)
        {
            $factura_id =factura::select('id')
            ->where('tipo', 1)
            ->whereIn('estado_id', [1])
            ->where('users_id',Auth::user()->id)
            ->first();

            $cantidadFactura=DB::table('facturaDetalle')
            ->join('factura','facturadetalle.factura_id','=','factura.id')
            ->where('factura.estado_id','1')
            ->where('factura.tipo','1')
            ->where('inventario_id',$request{'inventario_id'})
            ->sum('facturadetalle.cantidad');

           if ($request{'cantidad'}<=$request{'stock'}-$cantidadFactura){
                $request->request->add(['factura_id' => $factura_id{'id'}]);
                facturaDetalle::create($request->all());
            }
        }
        return redirect()->route('venta.index');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
