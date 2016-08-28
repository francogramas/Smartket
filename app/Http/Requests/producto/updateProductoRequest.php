<?php

namespace SmartKet\Http\Requests\producto;

use SmartKet\Http\Requests\Request;
use Illuminate\Routing\Route;
class updateProductoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function __construct(Route $route)
    {
        $this->route=$route;
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'nombre'=>'required|min:3|unique:productos,nombre,'.$this->route->getparameter('productos'),
            'codigo'=>'required|min:3|unique:productos,codigo,'.$this->route->getparameter('productos'),
            'categoria_id'=>'required|not_in:0'
        ];
    }

    public function messages()  
    {
        return ['categoria_id.not_in'=>'El campo es obloigatorio'];
    }
}