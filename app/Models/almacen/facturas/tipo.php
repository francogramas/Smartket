<?php

namespace SmartKet\Models\almacen\facturas;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table='tipo';
	protected $primarykey='id';

	protected $fillable=['id','nombre'];

	public function factura(){
		return $this -> belongsto(factura::class);
	}
}
