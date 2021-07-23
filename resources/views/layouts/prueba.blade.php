<!DOCTYPE html>
<html>
<head>
    <title>Cabañas-Sierrahuacha</title>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Muli" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css\sierrahuacha.css?v2.0') }}"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('css\lightbox.css?v1.2') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images\logotipov3.ico') }}">
    <link rel="stylesheet" href="{{ asset('font.css') }}">





</head>
<body>

<div class="contenedor">


    <header class="header"> <!-- header -->
        <figure class="logotipo"> <!--logotipo -->
            <img src="{{ asset('images\logotipov3.ico') }}" alt="sierrahuacha logotipo"/>
        </figure>

        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><img src="{{ asset('images\logomenu.png') }}" alt="" width=30></label>

        <nav class="menu1"><!-- menu -->
            <ul class="barra">
                <li>
                    <a class="btn btn_light" href="/">Inicio</a>
                </li>
                <li>
                    <a class="btn btn_light" href="/ubicacion">Ubicacion</a>
                </li>
                <li>
                    <a class="btn btn_light" href="/disponibilidad">Reserva</a>
                </li>
                <li>
                    <a class="btn btn_light" href="/contacto">Contacto</a>
                </li>
                <li>
                    <a class="btn btn_light" href="/fotos">Fotos</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="social-bar">
        <a href="https://www.facebook.com/CabanasSierraHuachaFutaleufu" class="icon icon-facebook" target="_blank"></a>
        <a href="https://api.whatsapp.com/send?phone=56974205793&text=Hola%20necesito%20consultar%20por%20reservas" class="icon icon-whatsapp" target="_blank"></a>
    </div>

    @yield('content')


    <footer id="footer">
        <div class="contacto">
            <div class="foot-part">

                <img src="{{ asset('images\logotipov3.ico') }}"  alt="logotipo footer"/>
                <a href="tel:+56974205793"><strong>Celular</strong> <span>+56974205793</span></a>
                <a href="tel:652721473"><strong>Telefono</strong> <span>(65)-2721473</span></a>
                <a href="mailto:sierrahuacha@gmail.com"><strong>Email</strong> <span>sierrahuacha@</span></a>
            </div>

        </div>
    </footer>

</div>
<script src="{{ asset('/js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ asset('/js/lightbox.js') }}"></script>
</body>
</html>
