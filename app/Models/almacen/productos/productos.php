<?php

namespace SmartKet\Models\almacen\productos;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    //
    protected $table='productos';
	protected $primarykey='id';

	protected $fillable=['id','nombre','codigo','categoria_id'];

	public function categorias(){
		return $this -> hasmany(categorias::class);
	}
}
