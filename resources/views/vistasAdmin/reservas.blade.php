@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Crud Reservas') }}</div>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <table class="table">

                                <thead>
                                <tr class="info alert-info">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Id Cabaña</th>
                                    <th>Correo</th>
                                    <th>Pago Reserva</th>
                                    <th>Personas</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                @foreach($reservas as $dato)
                                    <tbody>
                                    <tr>
                                        <td>{{ $dato->id }}</td>
                                        <td>{{ $dato->nombre }}</td>
                                        <td>{{ $dato->apellido }}</td>
                                        <td>{{ $dato->id_cabanas }}</td>
                                        <td>{{ $dato->correo }}</td>
                                        <td>{{ $dato->pago_reserva }}</td>
                                        <td>{{ $dato->descripcion_reserva }}</td>
                                        <td><a class="hoverable alert alert-success " href="{{route('admin.edit', $dato->id)}}">editar</a></td>
                                        <td>
                                            <form action="{{route('admin.destroy', $dato->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="hoverable alert alert-danger" type="submit" >Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach

                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
