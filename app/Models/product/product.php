<?php namespace SmartKet\models\product;

use Illuminate\Database\Eloquent\Model;

class product extends Model {

	protected $table='products';
	protected $primarykey='id';

	protected $fillable=[
	'id','name','price','marks_id'];

	public function mark(){
		return $this -> hasmany(mark::class);
	}

}
