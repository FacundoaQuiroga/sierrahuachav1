@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar Reserva') }}</div>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="card-body">

                    <div class="card card-cascade cascading-admin-card user-card">

                        <!-- Card Data -->
                        <form action="/adminReservas/{{$reserva->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="card-body card-body-cascade">
                                <h1></h1>
                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="id_cabanas" class="form-control form-control" name="id_cabanas" placeholder="{{ $reserva->id_cabanas }}" value="{{ $reserva->id_cabanas }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form12" class="">Id cabaña</label>
                                        </div>

                                    </div>


                                </div>

                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="nombre" class="form-control form-control" name="nombre" placeholder="{{ $reserva->nombre }}" value="{{ $reserva->nombre }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form5" class="">Nombre</label>
                                        </div>

                                    </div>

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="apellido" class="form-control form-control" name="apellido"  placeholder="{{ $reserva->apellido }}" value="{{ $reserva->apellido }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form5" class="">Apellido</label>
                                        </div>

                                    </div>


                                </div>

                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="correo" class="form-control form-control" name="correo" placeholder="{{ $reserva->correo }}" value="{{ $reserva->correo }}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form7" class="">Correo</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="pago_reserva" class="form-control form-control" name="pago_reserva" placeholder="{{ $reserva->pago_reserva }}" value="{{ $reserva->pago_reserva }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form8" class="">Pago reserva</label>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">


                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="numero_transaccion" class="form-control form-control" name="numero_transaccion" placeholder="{{ $reserva->numero_transaccion }}" value="{{ $reserva->numero_transaccion }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form12" class="">Numero transaccion</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="codigo_reserva" class="form-control form-control" name="codigo_reserva" placeholder="{{ $reserva->codigo_reserva }}" value="{{ $reserva->codigo_reserva }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form13" class="">Codigo reserva</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-12 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="descripcion_reserva" class="form-control form-control" name="descripcion_reserva" placeholder="{{ $reserva->descripcion_reserva }}" value="{{ $reserva->descripcion_reserva }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form13" class="">Cantidad de personas</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="fecha_ingreso" class="form-control form-control" name="fecha_ingreso" placeholder="{{ $reserva->fecha_ingreso }}" value="{{ $reserva->fecha_ingreso }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form13" class="">Fecha ingreso</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm mb-0">
                                            <input type="text" id="fecha_salida" class="form-control form-control" name="fecha_salida" placeholder="{{ $reserva->fecha_salida }}" value="{{ $reserva->fecha_salida }}" >
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="form13" class="">Fecha salida</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>

                            </div>

                            <button class="m-3 btn btn-primary" type="submit" >Editar</button>
                            <!-- Card content -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
