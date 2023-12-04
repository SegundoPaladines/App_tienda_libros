@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('front.partials.msg')
                <div class="card-body">
                    <a href="{{route('fmr-add-libro')}}" class="btn - btn-success w-100">Añadir Libros</a>
                </div>
                <table class="table table-striped w-100">
                    <thead>
                        <th></th>
                        <th>Titulo</th>
                        <th>Editorial</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr class="align-middle">
                                <td><img width="80px" src="{{Storage::url($libro->imagen)}}" alt="img"></td>
                                <td>{{$libro->nombre}}</td>
                                <td>{{$libro->editorial}}</td>
                                <td>{{$libro->autor}}</td>
                                <td>{{$libro->pub_year}}</td>
                                <td>{{$libro->precio}}</td>
                                <td>
                                    <a href="{{route('eliminar-libro', $libro->id)}}" class="btn btn-danger w-100">X</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection