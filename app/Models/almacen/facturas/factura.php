<?php

namespace SmartKet\Models\almacen\facturas;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    protected $table='factura';
	protected $primarykey='id';

	protected $fillable=['id','numero','prefijo','tercero_id','fecha','tipo','estado_id','users_id'];

	public function facturaDetalle(){
		return $this -> belongsto(facturaDetalle::class);
	}

	public function estadoFactura(){
		return $this -> hasmany(estadoFactura::class);
	}

	public function terceros(){
		return $this -> hasmany(terceros::class);
	}

	public function tipo(){
		return $this -> hasmany(tipo::class);
	}

}
