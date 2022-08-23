@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar sitios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('site.update', $site) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss='alert' aria-label="close">
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Municipio</label>
                        <input type="text" name="municipio" class="form-control" value="{{ $site->municipio }}">
                        <small class="text-danger">{{ $errors->first('municipio') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Lugar</label>
                        <input type="text" name="lugar" class="form-control" value="{{ $site->lugar }}">
                        <small class="text-danger">{{ $errors->first('lugar') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $site->nombre }}">
                        <small class="text-danger">{{ $errors->first('nombre') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Direccion</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $site->direccion }}">
                        <small class="text-danger">{{ $errors->first('direccion') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $site->telefono }}">
                        <small class="text-danger">{{ $errors->first('telefono') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Correo</label>
                        <input type="text" name="correo" class="form-control" value="{{ $site->correo }}">
                        <small class="text-danger">{{ $errors->first('correo') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Foto</label>
                        <span class="btn btn-secondary btn-file">
                            <i class="far fa-images"></i> <input accept="image/*" onchange="vistaPrevia(event)"
                                type="file" name="foto" class="form-control">
                        </span>
                        <small class="text-danger">{{ $errors->first('foto') }}</small>
                    </div>

                    <div class="imagen col-md-6 col-lg-6 col-sm-12">
                        <label for="">Vista previa foto</label> <br>
                        <img src="{{ asset('img/' . $site->foto) }}" id="img-foto" alt="">
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" value="{{ $site->descripcion }}">
                        <small class="text-danger">{{ $errors->first('descripcion') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Tipo Actividad</label>
                        <input type="text" name="tipo_actividad" class="form-control"
                            value="{{ $site->tipo_actividad }}">
                        <small class="text-danger">{{ $errors->first('tipo_actividad') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Horario Atencion</label>
                        <input type="text" name="horario_atencion" class="form-control"
                            value="{{ $site->horario_atencion }}">
                        <small class="text-danger">{{ $errors->first('horario_atencion') }}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Estado | 1 Activo | 2 Desactivado</label>
                        <input type="text" name="estado" class="form-control" value="{{ $site->estado }}">
                        <small class="text-danger">{{ $errors->first('estado') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4 text-center">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
            width: 100px;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .btn-file i {
            font-size: 23px;
        }

        .imagen img {
            max-width: 100%;
            max-height: 25vh;
        }
    </style>
@stop

@section('js')

    <script>
        function ocultarAlerta() {
            document.querySelector(".alert").style.display = "none";
        }
        setTimeout(ocultarAlerta, 3000);

        let vistaPrevia = () => {
            let leerImg = new FileReader();
            let id_img = document.getElementById('img-foto');

            leerImg.onload = () => {
                if (leerImg.readyState == 2) {
                    id_img.src = leerImg.result;
                }
            }

            leerImg.readAsDataURL(event.target.files[0])
        }
    </script>
@stop
