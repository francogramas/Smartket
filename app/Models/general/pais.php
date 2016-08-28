<?php namespace SmartKet\models\general;

use Illuminate\Database\Eloquent\Model;

class pais extends Model {

	//
	protected $table='pais';
	protected $primarykey='id';	
	protected $fillable=['id', 'sortname', 'name'];	
	
	// debuelbe la relacion de estados con los paises
	public function estados(){
		return $this -> belongsto(estados::class);
	}
}