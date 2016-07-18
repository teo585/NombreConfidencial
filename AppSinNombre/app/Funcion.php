<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
	protected $table ='funcion';
	protected $primaryKey = 'idFuncion';
	
	protected $fillable = ['numeroFuncion', 'descripcionFuncion', 'Dependencia_idDependencia'];

	public $timestamps = false;	

	public function dependencia()
	{
		return $this->hasOne('App\Dependencia','idDependencia');
	}
}