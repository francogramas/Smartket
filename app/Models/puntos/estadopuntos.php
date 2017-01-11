<?php

namespace SmartKet\Models\puntos;

use Illuminate\Database\Eloquent\Model;

class estadopuntos extends Model
{
     protected $table='estadopuntos';
	protected $primarykey='id';

	protected $fillable=['id','nombre','descripcion'];

	public function puntos(){
		return $this -> belongsto(puntos::class);
	}
}
