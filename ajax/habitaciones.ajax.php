<?php

use App\Http\Controllers\ReservaController;
use App\Models\Cabana;

class AjaxHabitaciones{

	public $ruta;

	public function ajaxTraerHabitacion(){

		$valor = $this->ruta;

		$respuesta = ReservaController::ctrMostrarCabanas($valor);

		echo json_encode($respuesta);

	}

}

if(isset($_POST["ruta"])){

	$ruta = new AjaxHabitaciones();
	$ruta -> ruta = $_POST["ruta"];
	$ruta -> ajaxTraerHabitacion();

}

