<?php namespace SmartKet\Http\Controllers\general;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;

use Illuminate\Http\Request;

class pais extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pais = \SmartKet\Models\general\pais::select('id','name','sortname')->get();
		$pais1 = \SmartKet\Models\general\pais::pluck('name','id')->prepend('Seleccione su pais');
		return View('/general/pais')->with('pais1',$pais1)->with('pais',$pais);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return('Hola mundo');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
