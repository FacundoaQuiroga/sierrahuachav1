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

                    <div class="bg-white p-4">

                        <script>
                            // Agrega credenciales de SDK
                            const mp = new MercadoPago('PUBLIC_KEY', {locale: 'es-AR'});

                            // Inicializa el Web Tokenize Checkout
                            mp.checkout({
                                tokenizer: {
                                    totalAmount: 4000,
                                    backUrl: 'https://www.mi-sitio.com/procesar-pago'
                                },
                                render: {
                                    container: '.tokenizer-container', // Indica dónde se mostrará el botón
                                    label: 'Pagar' // Cambia el texto del botón de pago (opcional)
                                }
                            });
                        </script>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
