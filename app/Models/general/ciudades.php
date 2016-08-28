<?php namespace SmartKet\models\general;

use Illuminate\Database\Eloquent\Model;

class ciudades extends Model {

	//
	protected $table='ciudades';
	protected $primarykey='id';	
	protected $fillable=['id', 'name', 'estados'];


	// devuelbe la relacion del pais con el estado

	public function estados(){
		return $this -> hasmany(estados::class);
	}

	public function terceros(){
		return $this -> belongsto(terceros::class);
	}

	public static function ciudades($id)
	{
		return ciudades::where ('estados','=',$id)
		->get();
	}
}