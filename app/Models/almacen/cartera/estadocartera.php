<?php

namespace SmartKet\Models\almacen\cartera;

use Illuminate\Database\Eloquent\Model;

class estadocartera extends Model
{
    protected $table='estadocartera';
	protected $primarykey='id';
	protected $fillable=['id','nombre'];

	public function cartera()
	{
		return $this->belongsTo(cartera::class);
	}

}
