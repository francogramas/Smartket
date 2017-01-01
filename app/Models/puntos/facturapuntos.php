<?php

namespace SmartKet\Models\puntos;

use Illuminate\Database\Eloquent\Model;

class facturapuntos extends Model
{
    protected $table='facturapuntos';
	protected $primarykey='id';

	protected $fillable=['id','numero','prefijo','tercero_id','fecha','tipo','estado_id','valor'];

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
