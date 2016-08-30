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

Route::get('/','almacen\almacenController@home');
Route::get('/Admterceros','almacen\almacenController@Admterceros');
Route::get('/Admterceros','almacen\almacenController@Admterceros');
Route::resource('/terceros','almacen\terceros');
Route::resource('/categorias','almacen\categoriaController');
Route::resource('/productos','almacen\productosController');

// Buscar Producto
Route::get('buscar/producto', 'almacen\productosController@autocomplete');
// End  Controladores de almacen
// Buscar Terceros
Route::get('buscar/tercero', 'almacen\terceros@autocomplete');

// ---------------------- Controladores generales
Route::resource('/pais','general\pais');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');
// inventario inicial
Route::resource('/inventario/inicial','almacen\inventario\inicial');
//facturas de venta
Route::resource('/facturas/venta','almacen\facturas\venta');
//facturas de compra
Route::resource('/facturas/compra','almacen\facturas\compra');
//facturas de Cotizacion
Route::resource('/facturas/cotizacion','almacen\facturas\cotizacion');
//facturas de pedidos
Route::resource('/facturas/pedido','almacen\facturas\pedido');
//facturas de pedidos
Route::resource('/facturas/devolucion','almacen\facturas\devolucion');



Route::get('/inventario/disponible', function()
{
	return View::make('almacen/inventario/disponible');
});

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
