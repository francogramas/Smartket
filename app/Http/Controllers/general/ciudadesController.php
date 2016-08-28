<?php

namespace SmartKet\Http\Controllers\general;
use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;

use SmartKet\models\general\ciudades;


class ciudadesController extends Controller
{
      public function getCiudades (Request $request, $id)
    {
        if ($request->ajax()){
            $ciudades=ciudades::ciudades($id);
            return response()->json($ciudades);
        }
    }
}
