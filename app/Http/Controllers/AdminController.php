<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $reservas = Reserva::all();
        return view('vistasAdmin.reservas', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //BUSCA EN LA TABLA RESERVA SI HAY UNA RESERVA IGUAL A LA QUE SE SELECCIONO AL PRESIONAR EL BOTON EDITAR
        $reserva = Reserva::findOrFail($id);

        //RETORNA VISTA EDITAR CON LOS DATOS DE EL USUARIO PARA QUE PUEDA VERLOS Y EDITARLOS
        return view('vistasAdmin.editReserva', compact('reserva'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //UNA VEZ PRESIONADO EL BOTON EDITAR EN LA VISTA EDITAR ENTONCES GUARDA TODOS LOS CAMBIOS DE ESA RESERVA EN PARTICULAR
        $reserva = Reserva::findOrFail($id);

        $reserva->id_cabanas = $request->get('id_cabanas');
        $reserva->nombre = $request->get('nombre');
        $reserva->apellido = $request->get('apellido');
        $reserva->correo = $request->get('correo');
        $reserva->pago_reserva = $request->get('pago_reserva');
        $reserva->numero_transaccion = $request->get('numero_transaccion');
        $reserva->codigo_reserva = $request->get('codigo_reserva');
        $reserva->descripcion_reserva = $request->get('descripcion_reserva');
        $reserva->fecha_ingreso = $request->get('fecha_ingreso');
        $reserva->fecha_salida = $request->get('fecha_salida');
        $reserva->save();

        //REDIRIGE A LA VISTA ANTERIOR UNA VEZ COMPLETA LA EDICION
        return redirect()->back()->with('success', 'Se ha editado la reserva seleccionada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //BUSCA LA RESERVA POR EL ID AL PRESIONAR EL BOTON ELIMINAR  Y LO BORRA DE LA BASE DE DATOS
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        //REDIRIGE A LA VISTA ANTERIOR
        return redirect()->back()->with('success', 'Se ha eliminado la reserva seleccionada');
    }
}
