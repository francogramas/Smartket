<?php namespace SmartKet\models\product;

use Illuminate\Database\Eloquent\Model;

class mark extends Model {

	protected $table='marks';
	protected $primarykey='id';	
	protected $fillable=[
	'id','name'];

public function product(){
		return $this -> belongsto(product::class);
	}

}