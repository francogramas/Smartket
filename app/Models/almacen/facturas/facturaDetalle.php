<?php

namespace SmartKet\Models\almacen\facturas;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class facturaDetalle extends Model
{

	protected $table='facturaDetalle';
	protected $primarykey='id';

	protected $fillable=['id','factura_id','lote','cantidad','producto_id','costo','valor','stockMin','vence','inventario_id'];

	public function productos(){
		return $this -> hasmany(productos::class);
	}

	public function factura(){
		return $this -> hasmany(factura::class);
	}

	public function fvence()
	{
	    return Carbon::createFromFormat('Y-m-d', $this->vence);
	}
}
