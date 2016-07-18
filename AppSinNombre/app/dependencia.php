<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
	protected $table ='dependencia';
	protected $primaryKey = 'idDependencia';
	
	protected $fillable = ['codigoDependencia', 'nombreDependencia', 'abreviaturaDependencia'];

	public $timestamps = false;	

	public function funciones() 
	{
		return $this->hasMany('App\Funcion','Dependencia_idDependencia');
	}

	public function retenciondocumental() 
	{
		return $this->hasMany('App\RetencionDocumental','Dependencia_idDependencia');
	}

	public function radicado() 
	{
		return $this->hasMany('App\Radicado','Dependencia_idDependencia');
	}
}