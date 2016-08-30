<?php

namespace SmartKet\Models\almacen\inventario;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table='inventario';
	protected $primarykey='id';

	protected $fillable=['id','producto_id','cantidad','valor','costo','stock','stockmin','lote','vence'];

	public function productos(){
		return $this -> hasmany(productos::class);
	}

	public function factura(){
		return $this -> hasmany(factura::class);
	}
}
