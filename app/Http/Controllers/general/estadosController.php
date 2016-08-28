<?php

namespace SmartKet\Http\Controllers\general;
use Illuminate\Http\Request;

use SmartKet\Http\Requests;
use SmartKet\Http\Controllers\Controller;

use SmartKet\models\general\estados;

class estadosController extends Controller
{
    public function getEstados(Request $request, $id)
    {
        if ($request->ajax()){
            $estados=estados::estados($id);
            return response()->json($estados);
        }
    }
}
