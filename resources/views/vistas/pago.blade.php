@extends('layouts.prueba2')
@section('content')


    <!--=====================================
INFO RESERVAS
======================================-->

    <div class="infoReservas container-fluid bg-white p-0 pb-5">

        <div class="container">

            <div class="row">

                <!--=====================================
                BLOQUE IZQ
                ======================================-->

                <div class="col-12 col-lg-8 colIzqReservas p-0">

                    <!--=====================================
                    CABECERA RESERVAS
                    ======================================-->

                    <div class="pt-4 cabeceraReservas">

                        <a href="javascript:history.back()" class="float-left lead text-black pt-1 px-3">
                            <h5><i class="fas fa-chevron-left"></i> Regresar</h5>
                        </a>

{{--                        <div class="clearfix"></div>--}}

{{--                        <h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>--}}

{{--                        <h6 class="float-right px-3">--}}

{{--                            <br>--}}
{{--                            <a href="<?php echo $ruta;  ?>perfil" style="color:#FFCC29">Ver tus reservas</a>--}}

{{--                        </h6>--}}

{{--                        <div class="clearfix"></div>--}}

                    </div>

                    <div class="bg-white p-4 ">


                        <?php use App\Models\Reserva;if(isset($_COOKIE["codigoReserva"])): ?>

                        <?php

                            $validarPagoReserva = false;

                            $hoy = date("Y-m-d");

                            if($hoy >= $_COOKIE["fechaIngreso"] || $hoy >= $_COOKIE["fechaSalida"]){

                                echo '<div class="alert alert-danger mt-5"> Lo sentimos, las fechas de la reserva no pueden ser igual o inferiores al dia de hoy,
                                vuelve a intentarlo</div>';

                                $validarPagoReserva = false;

                            }else{
                                $validarPagoReserva = true;
                            }

                            /*============================
                            CRUCE DE FECHAS
                            =============================*/

                            $valor = $_COOKIE["idHabitacion"];

                            $validarReserva = Reserva::where('id_cabanas', $valor)->get();

                            $opcion01 = array();
                            $opcion02 = array();
                            $opcion03 = array();

                            if ($validarReserva != null){

                                    foreach ($validarReserva as $key => $value){

                                        //validar cruce de fechas opcion 1
                                        if ($_COOKIE["fechaIngreso"] == $value["fecha_ingreso"]){

                                            array_push($opcion01, false);

                                        }else{
                                            array_push($opcion01, true);
                                        }

                                        //validar cruce de fechas opcion 2
                                        if ($_COOKIE["fechaIngreso"] > $value["fecha_ingreso"] && $_COOKIE["fechaIngreso"] < $value["fecha_salida"]){

                                            array_push($opcion02, false);

                                        }else{
                                            array_push($opcion02, true);
                                        }

                                        //validar cruce de fechas opcion 3
                                        if ($_COOKIE["fechaIngreso"] < $value["fecha_ingreso"] && $_COOKIE["fechaSalida"] > $value["fecha_ingreso"]){

                                            array_push($opcion03, false);

                                        }else{
                                            array_push($opcion03, true);
                                        }

                                        if ($opcion01[$key] == false || $opcion02[$key] == false || $opcion03[$key] == false){

                                            $validarPagoReserva = false;

                                            echo '<div class="d-flex ml-5 p-5 alert alert-warning">Lo sentimos, las fechas de la reserva que habias seleccionado han sido ocupadas
                                            <a href="javascript:history.back()" class="btn btn-danger btn-sm">vuelve a intentarlo</a> </div>';

                                            break;

                                        }else{

                                            $validarPagoReserva = true;
                                        }

                                    }
                            }
                        ?>

                        <?php if ($validarPagoReserva): ?>

                            <div class="card">
                                <div class="card-header">
                                    <h2>Porfavor realice el pago de la reserva</h2>
                                </div>
                                <div class="card-body text-center m-3">
                                    <h4>Cantidad de Personas:</h4>
                                    <h3><strong> <?php echo $_COOKIE["infoHabitacion"]; ?></strong></h3>

                                    <h6>Fecha de ingreso 3:00pm <?php echo $_COOKIE["fechaIngreso"]; ?> - Fecha Salida 1:00pm <?php echo $_COOKIE["fechaSalida"]; ?></h6>

                                    <h4 class="mt-4">Precio a pagar:</h4>
                                    <h3><strong>$<?php echo floatval($_COOKIE["pagoReserva"]); ?></strong></h3>
                                    <figure class="p-4">
                                        <img src="images/mercadopago.png" class="img-fluid w-50">
                                    </figure>
                                </div>
                                <div class="card-footer d-flex">


                                    <form action="/pagado" method="POST" class="pt-3 ">
                                        @csrf
                                        <h5 class="mb-4">Ingrese sus datos y proceda al pago</h5>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="correo" placeholder="Correo" required>
                                            </div>
                                        </div>

                                        <script
                                            src="https://www.mercadopago.cl/integrations/v1/web-tokenize-checkout.js"
                                            data-public-key="TEST-2ce0521c-cf88-4a29-af61-18563720d848"
                                            data-transaction-amount="<?php echo $_COOKIE["pagoReserva"]; ?>"
                                            data-summary-product-label="<?php echo $_COOKIE["infoHabitacion"]; ?>"
                                            data-summary-product="<?php echo $_COOKIE["pagoReserva"]; ?>"
                                            data-min-installments = 1
                                            data-max-installments = 1>

                                        </script>
                                    </form>
                                </div>
                            </div>

                            <?php endif ?>

                            <?php else:?>

                            <div class="card mb-5 pb-5 mt-5">
                                <div class="card-header pt-4 mb-2 alert alert-success">
                                    <h2>Mensaje</h2>
                                </div>
                                <div class="card-body text-center m-5 p-5">
                                    <h4 class="mb-5 pb-5">Felicidades por su reserva si tiene dudas puede hacerlas dirigiendose al formulario de "Contacto"</h4>
                                </div>
                            </div>




                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
