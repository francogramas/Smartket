<?php

namespace SmartKet\Http\Controllers\almacen\inventario;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use Carbon\Carbon;
use \SmartKet\models\almacen\facturas\factura;
use \SmartKet\models\almacen\facturas\facturaDetalle;
use SmartKet\models\almacen\productos\productos;
use DB;
use Session;


class inicial extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $count = factura::where('tipo', 6)
        ->where('estado_id', 2)
        ->count();

        if ($count>0) {
            Session::flash('inicial','Ya existe un inventario inicial');            
        }

        $dateActual=Carbon::now()->format('Y-m-d');
        $date=Carbon::now()->addYears(5)->format('Y-m-d');

        $factura_id =factura::select('id')
            ->where('tipo', 6)
            ->where('estado_id', 1)
            ->first();

        $totales=DB::table('facturadetalle')
        ->select(DB::raw('sum(cantidad*costo) as costoTotal, sum(cantidad*valor) as valorTotal, sum(cantidad*valor)-sum(cantidad*costo) UtilidadNeta'))
        ->where('facturadetalle.factura_id','=',$factura_id{'id'})
        ->get();

        $facturaDetalles = facturaDetalle::select('facturadetalle.id','productos.nombre','productos.codigo','facturadetalle.lote','facturadetalle.costo','facturadetalle.valor','facturadetalle.cantidad','facturadetalle.stockMin','facturadetalle.vence')->
            join('productos','productos.id','=','facturadetalle.producto_id')->
            where('facturadetalle.factura_id',$factura_id{'id'})->
            get();

        return View('almacen/inventario/inventarioInicial')
        ->with('date',$date)
        ->with('dateActual',$dateActual)
        ->with('facturaDetalles',$facturaDetalles)
        ->with('totales',$totales->toArray());  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // esta funcion finaliza la factura y lleva todos los datos de la factura al inventario
        $count = factura::where('tipo', 6)
        ->where('estado_id', 1)
        ->count();

        if ($count>0)
        {
            $factura_id =factura::select('id')
            ->where('tipo', 6)
            ->where('estado_id', 1)
            ->first();   
            DB::statement('call fact2invent('.$factura_id{'id'}.');');
        }
        return redirect()->route('inicial.index');
    }

    public function store(Request $request)
    {
         $count1 = factura::where('tipo', 6)
        ->where('estado_id', 2)
        ->count();
        
        if ($count1==0){
            $count = factura::where('tipo', 6)
            ->where('estado_id', 1)
            ->count();

            if ($count==0)
            {
                factura::create($request->all());
            }

            $count1 = factura::where('tipo',6)->where('estado_id', 1)
            ->count();

            if ($count1>0)
            {
                $factura_id =factura::select('id')
                ->where('tipo', 6)
                ->where('estado_id', 1)
                ->first();
                $request->request->add(['factura_id' => $factura_id{'id'}]);
                facturaDetalle::create($request->all());
            }
        }
        return redirect()->route('inicial.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id,Request $request)
    {

        $facturaDetalle = facturaDetalle::FindOrFail($id);
        $facturaDetalle->delete();
        if($request->ajax()){
            return('el registro fue Eliminado');
        }
        return redirect()->route('inicial.index');
    }
}
