<?php namespace SmartKet\Http\Controllers\almacen;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;

use Illuminate\Http\Request;

class almacenController extends Controller {

	public function home()
	{
		return View('/almacen/home');
	}

	// Panel de administracion de terceros
	public function Admterceros()
	{
		return View('/almacen/terceros/admin');
	}

}
