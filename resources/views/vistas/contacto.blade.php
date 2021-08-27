@extends('layouts.prueba')
@section('content')

    <section id="reserva">
        <div class="con-res">

            <h3>Rellene los siguientes datos y nos pondremos en contacto. <hr>  Los campos de adultos y niños no es obligatorio rellenar</h3>
        </div>

        <form  class="formularioreserva" ACTION="{{asset('enviar_email.php')}}" METHOD="post"> <!-- formulario de reserva y envio a php -->
            <h1 class="form_titulo">Formulario Contacto</h1>
            <div class="contenedor-inputs">


                <input type="text" required id="nombre" name="nombre" tabindex="1" placeholder="nombre" class="input-48"></input>



                <input type="text" required id="apellido" name="apellido" tabindex="2" placeholder="apellido" class="input-48"></input>



                <input type="tel" required id="telefono" name="telefono" tabindex="3" placeholder="telefono" class="input-100"></input>



                <input type="email" required id="email" name="email" tabindex="4" placeholder="email" class="input-100"></input>


                <textarea name="message" id="message"  tabindex="9" placeholder="mensaje" class="input-100"></textarea>
                <input type="submit" value="Enviar" class="buttonreserva"  tabindex="10"/><a href="/contacto"></a>

            </div>

            <!--cols="30" rows="7"-->

        </form>


    </section>

@endsection
