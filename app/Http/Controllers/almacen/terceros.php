<?php

namespace SmartKet\Http\Controllers\almacen;

use Illuminate\Http\Request;
use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;

use SmartKet\models\general\pais;
use SmartKet\models\general\estados;
use SmartKet\models\general\ciudades;
use SmartKet\http\Requests\tercero\createTerceroRequest;
use SmartKet\http\Requests\tercero\updateTerceroRequest;

use Session;


class terceros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pais = pais::select('id','name','sortname')->get();
        $pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
        $terceros =\SmartKet\models\almacen\terceros::paginate(10);
        return View('/almacen/terceros/admin')->with('pais1',$pais1)->with('terceros',$terceros);
    }

    public function autocomplete( Request $request){
        $term = $request->input('term');
        $results = array();
        $queries = \SmartKet\models\almacen\terceros::select('id','nombres','apellido1','apellido2','nit')
            ->where('nombres', 'LIKE', '%'.$term.'%')
            ->orWhere('nit', 'LIKE', '%'.$term.'%')
            ->orWhere('apellido1', 'LIKE', '%'.$term.'%')
            ->orWhere('apellido2', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nit.' || '.$query->nombres.' '.$query->apellido1.' '.$query->apellido2  ];
        }
        return Response()->json($results);
    }


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
    public function store(createTerceroRequest $request)
    {
        //
        \SmartKet\models\almacen\terceros::create($request->all());
        $pais = pais::select('id','name','sortname')->get();
        $pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
        $terceros =\SmartKet\models\almacen\terceros::paginate(10);
        Session::flash('save','El registro fue guardado correctamente');
        return View('/almacen/terceros/admin')->with('pais1',$pais1)->with('terceros',$terceros);
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
        $pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
        $terceros =\SmartKet\models\almacen\terceros::FindOrFail($id);
        $departamentos=ciudades::select('estados as estado')->where('id','=',$terceros->ciudad)->get();

        //$paises1=estados::select('paises')->where('id','=',$departamentos->estados)->get();

        //$departamentos1=estados::where('paises','=',$paises->paises)->pluck('name','id');
        //$ciudades1=ciudades::pluck('name','id')->where('estados','=',$departamentos->id);
        return View('/almacen/terceros/editTerceros')->with('pais1',$pais1)->with('terceros',$terceros);
        //return($terceros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateTerceroRequest $request, $id)
    {
        //
        $terceros = \SmartKet\models\almacen\terceros::FindOrFail($id);
        $input=$request->all();
        $terceros ->fill($input)->save();
        Session::flash('update','El registro fue actualizado correctamente');
        return redirect()->route('terceros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\http_date()\Response
     */
    public function destroy($id)
    {
        //
        Session::flash('save','El registro fue guardado correctamente');

    }
}
