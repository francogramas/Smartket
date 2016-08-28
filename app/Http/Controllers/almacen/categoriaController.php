<?php

namespace SmartKet\Http\Controllers\almacen;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use SmartKet\models\almacen\productos\categorias;
use Session;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = categorias::select('id','nombre')->paginate(10);
        return View('/almacen/productos/categorias')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/almacen/productos/editarCategorias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         categorias::create($request->all());
        $categorias = categorias::select('id','nombre')->paginate(10);
        Session::flash('save','El registro fue guardado correctamente');
        return View('/almacen/productos/categorias')->with('categorias',$categorias);
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
        $categorias = categorias::FindOrFail($id);
        return view('/almacen/productos/eliminarCategorias',array('categorias'=>$categorias));
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
        $categorias = categorias::FindOrFail($id);
        return view('/almacen/productos/editarCategorias',array('categorias'=>$categorias));
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
         $categorias = categorias::FindOrFail($id);
        $input=$request->all();
        $categorias ->fill($input)->save();
        Session::flash('update','El registro fué actualizado correctamente');
        return redirect()->route('categorias.index');
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
        $categorias = categorias::FindOrFail($id);
        $categorias->delete();
        Session::flash('delete','El registro fue eliminado correctamente');
        return redirect()->route('categorias.index');
    }

}
