@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Imagenes</div>
{{--                        <div>--}}
{{--                            <form class="form-inline">--}}
{{--                                <select class="form-control">--}}
{{--                                    <option>Antiguo</option>--}}
{{--                                    <option>Nuevo</option>--}}
{{--                                </select>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
{{--                        <div class="col-md-3">--}}
{{--                            <div class="list-group">--}}
{{--                                <a href="javascript:filter_image('')" class="list-group-item list-group-item-action">Todas</a>--}}
{{--                                <a href="javascript:filter_image('cabañas')" class="list-group-item list-group-item-action">Cabañas</a>--}}
{{--                                <a href="javascript:filter_image('paisaje')" class="list-group-item list-group-item-action">paisaje</a>--}}
{{--                                <a href="javascript:filter_image('actividades')" class="list-group-item list-group-item-action">actividades</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-12">
                                    @if($errors->any())
                                        @foreach($errors->all() as $error)

                                            <div class="alert alert-danger">
                                                <strong>Error!</strong> {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif

                                    <button data-toggle="collapse" class="btn btn-success" data-target="#demo">Añadir Imagen</button>

                                    <div id="demo" class="collapse">
                                        <form action="{{ route('image-store') }}" method="post" id="image_upload_form" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="caption">Imagen titulo</label>
                                                <input type="text" name="caption" class="form-control" placeholder="Ingrese titulo imagen" id="caption">
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Seleccionar Categoria:</label>
                                                <select name="category" class="form-control" id="category">
                                                    <option value="">Selecciona una categoria</option>
                                                    <option value="cabañas">Cabañas</option>
                                                    <option value="paisaje">Paisaje</option>
                                                    <option value="actividades">Actividades</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Subir Imagen</label>
                                                <div class="preview-zone hidden">
                                                    <div class="box box-solid">
                                                        <div class="box-header with-border">
                                                            <div><b>Preview</b></div>
                                                            <div class="box-tools pull-right">
                                                                <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                    <i class="fa fa-times"></i> Cancelar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body"></div>
                                                    </div>
                                                </div>
                                                <div class="dropzone-wrapper">
                                                    <div class="dropzone-desc">
                                                        <i class="glyphicon glyphicon-download-alt"></i>
                                                        <p>Eliga una imagen o arrastrela aqui.</p>
                                                    </div>
                                                    <input type="file" name="image" class="dropzone">
                                                </div>

                                                <div id="image_error"></div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">

                                    <div class="row">


                                            @foreach($data as $image)
                                                <div class="col-md-3 mb-4">
                                                    <a href="{{asset('images/user_images/'.$image->image)}}" class="fancybox" data-caption="{{$image->caption}}" data-id="{{$image->id}}" data-fancybox="gallery">
                                                        <img src="{{asset('images/user_images/thumb/'.$image->image)}}" height="100%" width="100%">
                                                    </a>
                                                </div>
                                            @endforeach


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<form id="image-delete-form" action="" method="post">
    @csrf
    @method('DELETE');

</form>

@endsection

@section('js')

    <script type="text/javascript">

        var query={};

        function filter_image(value){
            Object.assign(query,{'category':value});
            window.location.href="{{route('adminFotos')}}"+'?'+$.param(query);
        }

        $.fancybox.defaults.btnTpl.delete="<button class='fancybox-button fancybox-delete-button'>Delete</button>";
        $.fancybox.defaults.buttons=['delete','close','share','download'];

        var current_image_id='';

        $('.fancybox').attr('rel','gallery').fancybox({
            beforeShow:function(instant,item){
                current_image_id=this.opts.id;
            }

        });

        $('body').on('click','button.fancybox-delete-button',function(e){

            swal({
                title: "¿Estas seguro que quieres eliminar esta foto?",
                text: "Una vez que elimines esta foto no podras volver a recuperarla",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var base_url="{{URL::to('/')}}";


                        $('#image-delete-form').attr('action',base_url+'/imagen-eliminada/'+current_image_id);
                        $('#image-delete-form').submit();

                    } else {
                        swal("has cancelado la eliminacion de la foto");
                    }
                });
        });


        $("#image_upload_form").validate({
            rules: {
                caption: {
                    required: true,
                    maxlength: 255
                },
                category: {
                    required: true,
                },
                image:{
                    required:true,
                    extension:"png|jpeg|jpg|bmp"
                }

            },
            messages: {
                caption: {
                    required: "Porfavor ingrese una imagen",
                    maxlength: "Max. 255 characters allowed."
                },
                category: {
                    required: "Porfavor seleccione una categoria.",
                },
                image: {
                    required: "Porfavor cargue una imagen.",
                    extension: "Only jpeg,jpg,png,bmp image allowed"
                }
            },
            errorPlacement:function(error,element){
                if(element.attr('name')=="image"){
                    error.insertAfter("#image_error");
                }else{
                    error.insertAfter(element);
                }
            }

        });


        function readFile(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {

            var validImageType=['image/png','image/bmp','image/jpeg','image/jpg'];

            if(!validImageType.includes(input.files[0]['type'])){
                var htmlPreview =
                    '<p>Imagen no disponible</p>' +
                    '<p>' + input.files[0].name + '</p>';
            }else{
                var htmlPreview =
                    '<img width="70%" height="300" src="' + e.target.result + '" />' +
                    '<p>' + input.files[0].name + '</p>';
            }


        var wrapperZone = $(input).parent();
        var previewZone = $(input).parent().parent().find('.preview-zone');
        var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

        wrapperZone.removeClass('dragover');
        previewZone.removeClass('hidden');
        boxZone.empty();
        boxZone.append(htmlPreview);
        };

        reader.readAsDataURL(input.files[0]);
        }
        }

        function reset(e) {
        e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
            }

            $(".dropzone").change(function() {
            readFile(this);
            });

            $('.dropzone-wrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
            });

            $('.dropzone-wrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
            });

            $('.remove-preview').on('click', function() {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
            });
    </script>
@endsection
