<?php

namespace SmartKet\Http\Controllers\almacen\inventario;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use SmartKet\Models\almacen\inventario\inventario;
use SmartKet\Models\almacen\productos\productos;


class inventarioController extends Controller
{
    public function index(){
    	$inventario=inventario::select('inventario.lote','productos.codigo','productos.nombre','inventario.cantidad','inventario.costo','inventario.valor')
    	->join('productos','inventario.producto_id','=','productos.id')
    	->orderBy('productos.nombre')
    	->get();
    	return view('almacen.inventario.disponible')->with('inventario',$inventario);
    }
}