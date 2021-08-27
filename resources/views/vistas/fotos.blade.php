@extends('layouts.prueba')

@section('content')
    <section class="section-fotos">


        <div class="galeria">

            @foreach($data as $image)
            <a href="{{asset('images/user_images/'.$image->image)}}" rel="lightbox[roadtrip]1"><img  src="{{asset('images/user_images/thumb/'.$image->image)}}" width="220" height="130"  title="click para ampliar" /></a>
            @endforeach
        </div>



    </section>


@endsection

