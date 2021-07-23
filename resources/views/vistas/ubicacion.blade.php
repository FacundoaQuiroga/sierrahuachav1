@extends('layouts.prueba')
@section('content')

    <section id="ubicacion">

        <div class="cont-ubi">
            <h1>Ubicacion</h1>
            <h3>Como llegar a futaleufú</h3>
        </div>
        <div class="foto-futa">
            <img src="https://i.imgur.com/tZFAzu0.jpg" alt="">
        </div>

        <section id="ruta-futa">
            <div class="ruta">
                <p>Para llegar a futaleufu Usted puede hacerlo por via chilena o argentina en la siguiente imagen usted podra ver el camino de color rojo el cual es por argentina y pasa desde la aduana cardenal samore hasta el paso fronterizo futaleufú, y el camino violeta el cual es la carretera austral pasa por hornopiren, chaiten, villa santa lucia y finalmente a futaleufu   </p>
                <img src="images\como-llegar.jpg" alt="">
            </div>
        </section>

        <section id="google-maps">

            <div class="mapa">
                <h1>Ubicacion con Google maps</h1>
                <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d986.5558970604166!2d-71.85148107088587!3d-43.18996299732974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x961ddc242f62d919%3A0x7bbdac0de22574d6!2sFUTALEUFU+CABA%C3%91AS+SIERRA+HUACHA!5e1!3m2!1ses-419!2scl!4v1535307384086" width="610" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
        </section>

    </section>

@endsection
