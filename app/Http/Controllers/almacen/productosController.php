<?php

namespace SmartKet\Http\Controllers\almacen;

use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;
use SmartKet\models\almacen\productos\productos;
use SmartKet\models\almacen\productos\categorias;
use SmartKet\http\Requests\producto\createProductoRequest;
use SmartKet\http\Requests\producto\updateProductoRequest;
use Session;


class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = categorias::pluck('nombre','id');
        $productos = productos::select('productos.id','productos.nombre','productos.codigo','categorias.nombre as categorias')->
        join('categorias','categorias.id','=','productos.categoria_id')->
        paginate(10);

        return View('/almacen/productos/administrar')->with('categorias',$categorias)->with('productos',$productos);
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

    public function autocomplete( Request $request){
        $term = $request->input('term');
        $results = array();

        $queries = productos::select('id','nombre','codigo')
            ->where('nombre', 'LIKE', '%'.$term.'%')
            ->orWhere('codigo', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->codigo.' || '.$query->nombre ];
        }
        return Response()->json($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createProductoRequest $request)
    {
        //
        productos::create($request->all());
        $categorias = categorias::pluck('nombre','id');
        $productos = productos::select('productos.id','productos.nombre','productos.codigo','categorias.nombre as categorias')->
        join('categorias','categorias.id','=','productos.categoria_id')->
        paginate(10);
        Session::flash('save','El registro fue guardado correctamente');
        return View('/almacen/productos/administrar')->with('categorias',$categorias)->with('productos',$productos);
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
        $categorias = categorias::pluck('nombre','id');
        $productos = productos::FindOrFail($id);
        return View('/almacen/productos/eliminarProductos')->with('categorias',$categorias)->with('productos',$productos);
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
        $categorias = categorias::pluck('nombre','id');
        $productos = productos::FindOrFail($id);
        return View('/almacen/productos/editarProductos')->with('categorias',$categorias)->with('productos',$productos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateProductoRequest $request, $id)
    {
        //
        $productos = productos::FindOrFail($id);
        $input=$request->all();
        $productos ->fill($input)->save();
        Session::flash('update','El registro fue actualizado correctamente');
        return redirect()->route('productos.index');
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
        $productos = productos::FindOrFail($id);
        $productos->delete();
        Session::flash('delete','El registro fue eliminado correctamente');
        return redirect()->route('productos.index');
    }
}
