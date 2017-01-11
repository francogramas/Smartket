<?php

namespace SmartKet\Models\almacen\cartera;

use Illuminate\Database\Eloquent\Model;

class cartera extends Model
{
    protected $table='cartera';
	protected $primarykey='id';
	protected $fillable=['id','tercero_id','estadocartera_id','tipocartera_id','deuda','abono'];

	
	public function estadocartera()
	{
		return $this->hasMany(estadocartera::class);
	}

	public function tipocartera()
	{
		return $this->hasMany(tipocartera::class);
	}

	public function terceros()
	{
		return $this->hasMany(terceros::class);
	}

}
