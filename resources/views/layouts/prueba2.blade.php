
<!DOCTYPE html>
<html>
<head>
    <title>Cabañas-Sierrahuacha</title>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Muli" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css\sierrahuacha.css?v2.0') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('css\lightbox.css?v1.2') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images\logotipov3.ico') }}">
    <link rel="stylesheet" href="{{ asset('font.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="css/plugins/bootstrap-datepicker.standalone.min.css">

    <!-- jdSlider -->
    <link rel="stylesheet" href="css/plugins/jquery.jdSlider.css">

    <!-- Pano -->
    <link rel="stylesheet" href="css/plugins/jquery.pano.css">

    <!-- fullCalendar -->
    <link rel="stylesheet" href="css/plugins/fullcalendar.min.css">



    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/habitaciones.css">
    <link rel="stylesheet" href="css/reservas.css">

    <!--=====================================
        VÍNCULOS JAVASCRIPT
        ======================================-->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-- bootstrap datepicker -->
    <!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
    <script src="js/plugins/bootstrap-datepicker.min.js"></script>

    <!-- https://easings.net/es# -->
    <script src="js/plugins/jquery.easing.js"></script>

    <!-- https://markgoodyear.com/labs/scrollup/ -->
    <script src="js/plugins/scrollUP.js"></script>

    <!-- jdSlider -->
    <!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
    <script src="js/plugins/jquery.jdSlider-latest.js"></script>

    <!-- Pano -->
    <!-- https://www.jqueryscript.net/other/360-Degree-Panoramic-Image-Viewer-with-jQuery-Pano.html -->
{{--    <script src="js/plugins/jquery.pano.js"></script>--}}

    <!-- fullCalendar -->
    <!-- https://momentjs.com/ -->
    <script src="js/plugins/moment.js"></script>
    <!-- https://fullcalendar.io/docs/background-events-demo -->
    <script src="js/plugins/fullcalendar.min.js"></script>

    <script src="js/plugins/jquerynumber.js"></script>

    <!-- SDK Client-Side Mercado Pago -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>

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


<script src="js/plantilla.js"></script>
<script src="js/menu.js"></script>
<script src="js/habitaciones.js"></script>
<script src="js/reservas.js"></script>



</body>
</html>
