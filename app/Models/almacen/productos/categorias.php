<?php

namespace SmartKet\Models\almacen\productos;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    //
    protected $table='categorias';
	protected $primarykey='id';

	protected $fillable=['id','nombre'];

	public function productos(){
		return $this -> belongsto(productos::class);
	}
}
