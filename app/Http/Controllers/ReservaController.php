<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Cabana;
use App\Models\Reserva;
use MercadoPago;

class ReservaController extends Controller
{

    public function index()
    {
        //VERIFICA SI SE ALMACENO LA CABAÑA DESPUES DE OPRIMIR EL BOTON "VER DISPONIBILIDAD"
        if (isset($_POST["id-habitacion"])) {

            //GUARDA EL ID DE LA CABAÑA EN LA VARIABLE $VALOR
            $valor = $_POST["id-habitacion"];

            //BUSCA LOS DATOS DE LA CABAÑA COMO FOTOS Y NOMBRE EN SU TABLA ATRAVES DE EL MODELO Cabana
            $reservas1 = Cabana::where('id', $valor)->first();
            $reservas = Reserva::where('id_cabanas', $valor)->get();

            //decodifica el array de la columna galeria y lo muestra como un json para poder mostrar las fotos de la cabaña
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
            // retorna la vista junto a variables para poder hacer uso de estas en la vista de reserva
            return view('vistas.reserva',['reservas' => $reservas, 'reservas1' => $reservas1, 'dias' => $dias, 'galeria' => $galeria]);

        } else {

            //si no funciona retorna origen
            echo '<script> window.location="/"</script>';

        }
    }

    public function vistaPagoMercado(){

        //una vez que el pago se hizo entonces se devolveran los datos de el pago
        if (isset($_REQUEST["token"])){

            $token = $_REQUEST["token"];
            $payment_method_id = $_REQUEST["payment_method_id"];
            $installments = $_REQUEST["installments"];
            $issuer_id = $_REQUEST["issuer_id"];


                MercadoPago\SDK::setAccessToken("TEST-906142169297948-072417-7d7911e2d8878f309b2cd69c270b04af-236881474");
                //...
                $payment = new MercadoPago\Payment();
                $payment->transaction_amount = $_COOKIE["pagoReserva"];
                $payment->token = $token;
                $payment->description = $_COOKIE["infoHabitacion"];
                $payment->installments = $installments;
                $payment->payment_method_id = $payment_method_id;
                $payment->issuer_id = $issuer_id;
                $payment->payer = array(
                    "email" => "john@yourdomain.com"
                );
                // Guarda y postea el pago
                $payment->save();
                echo '<pre>'; print_r($payment); echo '</pre>';

                if($payment->status == "approved") {

                    $reserva = new Reserva();
                    $reserva->id_cabanas = $_COOKIE["idHabitacion"];
                    $reserva->nombre = $_POST["nombre"];
                    $reserva->apellido = $_POST["apellido"];
                    $reserva->correo = $_POST["correo"];
                    $reserva->pago_reserva = $_COOKIE["pagoReserva"];
                    $reserva->numero_transaccion = $payment->id;
                    $reserva->codigo_reserva = $_COOKIE["codigoReserva"];
                    $reserva->descripcion_reserva = $_COOKIE["infoHabitacion"];
                    $reserva->fecha_ingreso = $_COOKIE["fechaIngreso"];
                    $reserva->fecha_salida = $_COOKIE["fechaSalida"];
                    $reserva->save();
                    //echo '<pre>'; print_r($reserva); echo '</pre>';


                    echo '<script>
                        document.cookie = "idHabitacion=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . "/" . ';";
                        document.cookie = "infoHabitacion=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . "/" . ';";
                        document.cookie = "pagoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . "/" . ';";
                        document.cookie = "codigoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . "/" . ';";
                        document.cookie = "fechaIngreso=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . "/" . ';";
                        document.cookie = "fechaSalida=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . "/" . ';";
                        </script>';

                    //echo '<div class="alert alert-success"><script >alert("La reserva ha sido exitosa")</script></div>';

                    return back()->with('message', 'reserva enviada con exito!');
                }
                else{
                    echo '<div class="alert alert-danger"><script >alert("Error vuelve a reservar!")</script></div>';
                    return view('vistas.disponibilidad');
                }


        }

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
//
//NO RETORNA LOS DATOS A RESERVAS.JS POR LO QUE ESTE METODO NO SE USA
//
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
