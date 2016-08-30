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


class venta extends Controller
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

        $factura_id =factura::where('tipo', 1)
            ->whereIn('estado_id', [1])
            ->first();

        $terceros1 = terceros::select('id','nombres','apellido1','apellido2','nit')
            ->where('id', '=', $factura_id{'id'})
            ->first();

        $facturaDetalles = facturaDetalle::select('facturadetalle.id','productos.nombre','productos.codigo','facturadetalle.lote','facturadetalle.costo','facturadetalle.valor','facturadetalle.cantidad','facturadetalle.stockMin','facturadetalle.vence')->
            join('productos','productos.id','=','facturadetalle.producto_id')->
            where('facturadetalle.factura_id',$factura_id{'id'})->
            get();

        return View('almacen/facturas/facturaVenta')
        ->with('date',$date)
        ->with('fecha',$fecha)
        ->with('facturaDetalles',$facturaDetalles)
        ->with('factura_id',$factura_id)
        ->with('terceros1',$terceros1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = factura::where('tipo', 1)
        ->whereIn('estado_id', [1])
        ->count();

        if ($count==0)
        {
            factura::create($request->all());
        }

        $count1 = factura::where('tipo',1)->where('estado_id', 1)
        ->count();

        if ($count1>0)
        {
            $factura_id =factura::select('id')
            ->where('tipo', 1)
            ->whereIn('estado_id', [1])
            ->first();
            $request->request->add(['factura_id' => $factura_id{'id'}]);
            facturaDetalle::create($request->all());
        }
        return redirect()->route('venta.index');
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
    public function destroy($id)
    {
        //
    }
}
