<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
	/*Route::resource('/admin/empresa', 'admin\empresaController');
	Route::resource('/admin/pacientes', 'admin\pacientesController');
	Route::resource('/admin/pacienteslistado', 'admin\pacientesListadoController');
	Route::resource('/admin/segurosmedicos', 'admin\contratacion\seguroMedicoController');
	Route::resource('/admin/segurosmedicoslistado', 'admin\contratacion\seguroMedicoListadoController');*/
	Route::resource('/admin/empleados', 'admin\contratacion\empleadosController');	
	Route::resource('/admin/empleadoslistado', 'admin\contratacion\empleadoslistadoController');	
	Route::resource('/admin/contratos', 'admin\contratacion\contratosController');	
	//facturas de venta
	Route::resource('/facturas/venta','almacen\facturas\venta');
	Route::resource('/facturas/ventapuntos','facturapuntosController');
	//facturas de compra
	Route::resource('/facturas/compra','almacen\facturas\compra');
	//facturas de Cotizacion
	Route::resource('/facturas/cotizacion','almacen\facturas\cotizacion');
	//facturas de pedidos
	Route::resource('/facturas/pedido','almacen\facturas\pedido');
	//facturas de pedidos
	Route::resource('/facturas/devolucion','almacen\facturas\devolucion');
	Route::resource('/inventario/disponible','almacen\inventario\inventarioController');
	Route::get('/','almacen\almacenController@home');
	Route::get('/Admterceros','almacen\almacenController@Admterceros');
	Route::get('/Admterceros','almacen\almacenController@Admterceros');
	Route::resource('/terceros','almacen\terceros');
	Route::resource('/categorias','almacen\categoriaController');
	Route::resource('/productos','almacen\productosController');
	Route::resource('/cartera','almacen\carteraController');

	
	Route::get('/inventario/consolidado', function()
	{
		return View::make('almacen/inventario/consolidado');
	});

	Route::get('/inventario/ajuste', function()
	{
		$date=Carbon::now()->addYears(5)->format('Y-m-d');
		return View::make('almacen/inventario/ajuste')->with('date',$date);
	});

	Route::get('/inventario/agotados', function()
	{
		return View::make('almacen/inventario/agotados');
	});

	// inventario inicial
	Route::resource('/inventario/inicial','almacen\inventario\inicial');

	Route::get('/inventario/inicialprint', function()
	{
		return View::make('almacen/inventario/inventarioInicialprint');
	});

});



// Buscar Producto
Route::get('buscar/producto', 'almacen\productosController@autocomplete');
Route::get('buscar/productoInventario', 'almacen\productosController@autocompleteInventario');
Route::get('buscar/productoVenta', 'almacen\productosController@autocompleteInventario');
// End  Controladores de almacen
// Buscar Terceros
Route::get('buscar/tercero', 'almacen\terceros@autocomplete');
// Empresa
Route::resource('/empresa','general\empresaController');


// ---------------------- Controladores generales
Route::resource('/pais','general\pais');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');



// --------------------------------------------------------------------------
Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});

Route::get('/stats', function()
{
	return View::make('stats');
});

Route::get('/welcome', function()
{
	return View::make('welcome');
});


Route::get('/progressbars', function()
{
	return View::make('progressbars');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
