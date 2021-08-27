@extends('layouts.prueba2')
@section('content')

    <!--=====================================
INFO HABITACIÓN
======================================-->

    <div class=" container-fluid bg-white p-0 pb-5">

        <div class="container">

            <div class="row">

                <!--=====================================
                BLOQUE IZQ
                ======================================-->

                <div class="col-12 col-lg-8 colIzqHabitaciones p-0">

                    <!--=====================================
                    CABECERA HABITACIONES
                    ======================================-->

                    <div class="pt-4 cabeceraHabitacion bg-primary">

                        <a href="{{ asset('/') }}" class="float-left lead text-white pt-1 px-3">
                            <h5><i class="fas fa-chevron-left"></i> Regresar</h5>
                        </a>

                        <h2 class="float-right text-white px-3 categoria">Cabañas</h2>

                        <div class="clearfix"></div>

                        <ul class="nav nav-justified mt-lg-4">

                            @foreach($cabana as $key => $dato)

                                <li class="nav-item">
                                        <a class="nav-link text-white" orden="{{ $key }}" ruta="{{ $dato->id }}" href="#">

                                            {{ $dato->nombre }}
                                        </a>
                                </li>
                            @endforeach




                        </ul>

                    </div>

                    <!--=====================================
                    MULTIMEDIA HABITACIONES
                    ======================================-->

                    <!-- SLIDE  -->

                    <section class="jd-slider mb-3 my-lg-3 slideHabitaciones">

                        <div class="slide-inner">

                            <ul class="slide-area">

                                @foreach($galeria as $dato)

                                    <li>

                                        <img src="{{ $dato }}" class="img-fluid">

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                        <a class="prev d-none d-lg-block" href="#">
                            <i class="fas fa-angle-left fa-2x text-white bg-dark"></i>
                        </a>

                        <a class="next d-none d-lg-block" href="#">
                            <i class="fas fa-angle-right fa-2x text-white bg-dark"></i>
                        </a>

                        <div class="controller d-block d-lg-none">

                            <div class="indicate-area"></div>

                        </div>

                    </section>


                    <!--=====================================
                    DESCRIPCIÓN HABITACIONES
                    ======================================-->

                    <div class="descripcionHabitacion px-3">

                        <h1 class="colorTitulos float-left">Descripcion</h1>



                        <div class="clearfix mb-4"></div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.
                        </p>

                        <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.
                        </p>

                        <br>



                        <p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>

                        <form action="/reserva" method="POST">
                        @csrf

                            <input type="hidden" name="id-habitacion" value="{{ $cabana[0]->id }}">
                            <div class="container">

                                <div class="row py-2" style="background:#509CC3">

                                    <div class="col-6 col-md-3 input-group pr-1">

                                        <input type="text" class="form-control datepicker entrada" placeholder="Entrada" name="fecha-ingreso" required>

                                        <div class="input-group-append">

                                            <span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

                                        </div>

                                    </div>

                                    <div class="col-6 col-md-3 input-group pl-1">

                                        <input type="text" class="form-control datepicker salida" placeholder="Salida" name="fecha-salida" required>

                                        <div class="input-group-append">

                                            <span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">

                                        <a href="" class="w-100">
                                            <input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">
                                        </a>

                                    </div>

                                </div>

                            </div>
                        </form>


                    </div>

                </div>

                <!--=====================================
                BLOQUE DER
                ======================================-->

                <div class="col-12 col-lg-4 colDerHabitaciones">

                    <h2 class="colorTitulos">CABAÑA INCLUYE:</h2>

                    <ul>
                        <li>
                            <h5>
                                <i class="fas fa-bed w-25 colorTitulos"></i>
                                <span class="text-dark small">camas 5</span>
                            </h5>
                        </li>

                        <li>
                            <h5>
                                <i class="fas fa-tv w-25 colorTitulos"></i>
                                <span class="text-dark small">TV de 42"</span>
                            </h5>
                        </li>

                        <li>
                            <h5>
                                <i class="fas fa-tint w-25 colorTitulos"></i>
                                <span class="text-dark small">Agua caliente</span>
                            </h5>
                        </li>


                        <li>
                            <h5>
                                <i class="fas fa-toilet w-25 colorTitulos"></i>
                                <span class="text-dark small">Baño privado</span>
                            </h5>
                        </li>

                        <li>
                            <h5>
                                <i class="fas fa-couch w-25 colorTitulos"></i>
                                <span class="text-dark small"> Sofá</span>
                            </h5>
                        </li>

                        <li>
                            <h5>
                                <i class="far fa-image w-25 colorTitulos"></i>
                                <span class="text-dark small">Balcón</span>
                            </h5>
                        </li>


                        <li>
                            <h5>
                                <i class="fas fa-wifi w-25 colorTitulos"></i>
                                <span class="text-dark small">Servicio Wifi</span>
                            </h5>
                        </li>
                    </ul>

                </div>


            </div>


        </div>

    </div>

@endsection
