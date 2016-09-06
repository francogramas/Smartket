<?php

namespace SmartKet\Models\general;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    //
	protected $table='empresa'; 
    protected $primarykey='id';	
	protected $fillable=['id', 'razonsocial', 'nit','ciudad','direccion','telefono','correo'];

	public function ciudades(){
		return $this -> hasmany(ciudades::class);
	}
}
