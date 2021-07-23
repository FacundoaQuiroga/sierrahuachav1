<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Cabana;
use App\Models\Reserva;

class ReservaController extends Controller
{

    public function index()
    {

        if (isset($_POST["id-habitacion"])) {


            $valor = $_POST["id-habitacion"];

            $reservas1 = Cabana::where('id', $valor)->first();
            $reservas = Reserva::where('id_cabanas', $valor)->get();

            $galeria = json_decode($reservas1["galeria"], true)[0];

            /*=============================================
            DEFINIR CANTIDAD DE DIAS DE LA RESERVA
            =============================================*/

            $fechaIngreso = new DateTime($_POST["fecha-ingreso"]);
            $fechaSalida = new DateTime($_POST["fecha-salida"]);
            $diff = $fechaIngreso->diff($fechaSalida);
            //echo '<pre class="bg-white">'; print_r($diff); echo '</pre>';
            $dias = $diff->days;

            if($dias == 0){

                $dias = 1;
            }

            return view('vistas.reserva',['reservas' => $reservas, 'reservas1' => $reservas1, 'dias' => $dias, 'galeria' => $galeria]);

        } else {

            echo '<script> window.location="/"</script>';

        }
    }

    public function vistaPagoMercado(){

        return view('vistas.pago');
    }


    public function pagoMercado(){


    }



    /*=============================================
      devolver reservas en la base de datos
     =============================================*/
    public $idHabitacion;

    public function datosReservasAjax(){
        $valor = $this->idHabitacion;
        //no es necesario filtrar ya que solo necesito devolver todos los datos a la vista
        $datos = Reserva::all();

        $respuesta = $datos;

        return response(json_encode($respuesta),200);
    }

    /*=============================================
      devolver codigo de reserva
     =============================================*/
    public $codigoReserva;

    public function traerCodigoReservaAjax(){
        $valor = $this->codigoReserva;
        //no es necesario filtrar ya que solo necesito devolver todos los datos a la vista
        $datos = Reserva::where('codigo_reserva', $valor)->get();

        $respuesta = $datos;

        return response(json_encode($respuesta),200);
    }

}
// verifica que llega el id de la cabana pero no es necesario ya que este ya lo tenemos
if(isset($_POST["idHabitacion"])){

    $idHabitacion = new ReservaController();
    $idHabitacion -> idHabitacion = $_POST["idHabitacion"];
    $idHabitacion -> datosReservasAjax();

}

// Traer Reserva Codigo
if(isset($_POST["codigoReserva"])){

    $codigoReserva = new ReservaController();
    $codigoReserva -> codigoReserva = $_POST["codigoReserva"];
    $codigoReserva -> traerCodigoReservaAjax();

}
