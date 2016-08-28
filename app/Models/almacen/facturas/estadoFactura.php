<?php

namespace SmartKet\Models\almacen\facturas;

use Illuminate\Database\Eloquent\Model;

class estadoFactura extends Model
{
    protected $table='estadoFactura';
	protected $primarykey='id';

	protected $fillable=['id','nombre'];

	public function factura(){
		return $this -> belongsto(factura::class);
	}
}
