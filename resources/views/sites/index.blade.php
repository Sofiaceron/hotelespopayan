@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de sitios</h1>
@stop

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Tipo Actividad</th>
                        <th scope="col">Horario Atencion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sites as $site)
                        <tr>
                            <td>{{ $site->id }}</td>
                            <td>{{ $site->municipio }}</td>
                            <td>{{ $site->lugar }}</td>
                            <td>{{ $site->nombre }}</td>
                            <td>{{ $site->direccion }}</td>
                            <td>{{ $site->telefono }}</td>
                            <td>{{ $site->correo }}</td>

                            <td>
                                <div class="imagen">
                                    <img class="img-fluid" src="{{ asset('img/' . $site->foto) }}" alt="">
                                </div>
                            </td>

                            <td>{{ $site->descripcion }}</td>
                            <td>{{ $site->tipo_actividad }}</td>
                            <td>{{ $site->horario_atencion }}</td>
                            <td>{{ $site->estado }}</td>
                            <td>
                                <a href="{{ route('site.edit', $site) }}" class="btn btn-warning">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{{ route('site.destroy', $site) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sites->links() }}
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        img {
            width: 100px;
            /* ANCHO_IMAGEN */
            border: solid silver 1px;
            height: 100px;
            /* ALTO_IMAGEN */
            background-position: center center;
            /* Centradode imagen*/
            background-repeat: no-repeat;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
