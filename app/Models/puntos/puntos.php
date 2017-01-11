<?php

namespace SmartKet\Models\puntos;

use Illuminate\Database\Eloquent\Model;

class puntos extends Model
{
     protected $table='facturapuntos';
	protected $primarykey='id';

	protected $fillable=['id','factura_id','tercero_id','estadopuntos_id','valor'];


	public function estadopuntos(){
		return $this -> hasmany(estadopuntos::class);
	}

	public function terceros(){
		return $this -> hasmany(terceros::class);
	}
}
