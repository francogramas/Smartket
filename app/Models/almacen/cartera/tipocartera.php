<?php

namespace SmartKet\Models\almacen\cartera;

use Illuminate\Database\Eloquent\Model;

class tipocartera extends Model
{
    protected $table='tipocartera';
	protected $primarykey='id';
	protected $fillable=['id','nombre'];

	public function cartera()
	{
		return $this->belongsTo(cartera::class);
	}
}
