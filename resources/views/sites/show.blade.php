@extends('adminlte::page')

    @section('title', 'Consulta')

@section('content_header')
    <h1>Servicios por sitio:{{''.$site->nombre}}</h1>
    <h3>Descripcion:{{''.$site->descripcion}}</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>{{$service->servicio}}</td>
                        <td>{{$service->precio}}</td>
                    </tr>    
                    @endforeach
                    
                </tbody>
            </table>
          </div>
        <div class="row">
            <div class="ml-4 mb-4 col-md-4">
                <a href="{{route('site.index')}}" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop