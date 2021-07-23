<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabana;

class CabanaController extends Controller
{
    public function fotosCabanas(){
        //traigo tabla cabana de base de datos desde modelo Cabana y envio a el slider de reserva
        $cabana = Cabana::all();

        $galeria = json_decode($cabana[0]["galeria"], true);

        return view('vistas.disponibilidad', compact('cabana','galeria'));
    }

    public $ruta;

    public function datosCabanasAjax(){
        //envio datos de tabla cabana a traves de un ajax a habiataciones.js
        $valor = $this->ruta;
        $datos = Cabana::all();

        $respuesta = $datos;

        return response(json_encode($respuesta),200);
    }
}
// traigo la ruta de el slider "1,2,3,4" pero no la necesito
if(isset($_POST["ruta"])){

    $ruta = new CabanaController();
    $ruta -> ruta = $_POST["ruta"];
    $ruta -> datosCabanasAjax();

}
