@extends('layouts.prueba')

@section('content')


    <div class="slide-cont">

        <div class="slider">
            <div class="text-slide">Cabañas Sierrahuacha-Futaleufú</div>
            <a class="button97" href="/disponibilidad">¡Reserva ya!</a>
            <ul>
                <li><img src="images\slider\slider1.jpg" alt=""></li>
                <li><img src="images\slider\slider2.jpg" alt=""></li>
                <li><img src="images\slider\slider3.jpg" alt=""></li>
                <li><img src="images\slider\slider4.jpg" alt=""></li>
            </ul>
        </div>

    </div>





    <section id="info">
        <h1>Servicios</h1>

        <div class="cont-serv">

            <div class="info-serv">
                <img src="images\serv1.jpg" alt="">
                <h4>Estacionamiento</h4>
            </div>
            <div class="info-serv">
                <img src="images\serv2.jpg" alt="">
                <h4>Calefaccion a leña</h4>
            </div>
            <div class="info-serv">
                <img src="images\serv3.jpg" alt="">
                <h4>Ropa de cama</h4>
            </div>
            <div class="info-serv">
                <img src="images\serv4.jpg" alt="">
                <h4>Wifi fibra optica</h4>
            </div>

        </div>
    </section>

@endsection
