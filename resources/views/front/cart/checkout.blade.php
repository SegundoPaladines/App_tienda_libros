@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 5px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Tienda de Libros</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                   <div class="card">
                        <div class="card-body">
                            @include('front.partials.msg')
                            @if (Cart::count())
                                <table class="table table-striped">
                                    <thead>
                                        <th></th>
                                        <th>Titulo</th>
                                        <th>Editorial</th>
                                        <th>Autor</th>
                                        <th>Año</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Precio Parcial</th>
                                        <td></td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach (Cart::content() as $libro)
                                            <tr class="align-middle">
                                                <td><img width="80px" src="/img/{{$libro->options->image}}" alt=""></td>
                                                <td>{{$libro->name}}</td>
                                                <td>{{$libro->options->editorial}}</td>
                                                <td>{{$libro->options->autor}}</td>
                                                <td>{{$libro->options->year}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{route('increment')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $libro->rowId }}" id="id" name="id">
                                                            <input type="submit" name="btn" class="btn btn-success w-100" value="+">
                                                        </form>
                                                        <p class="p-1 m0">{{$libro->qty}}</p>
                                                        <form action="{{route('decrement')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $libro->rowId }}" id="id" name="id">
                                                            <input type="submit" name="btn" class="btn btn-danger w-100" value="-">
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>${{number_format($libro->price, 2)}}</td>
                                                <td>${{number_format($libro->price * $libro->qty, 2)}}</td>
                                                <td> 
                                                    <form action="{{route('remove')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $libro->rowId }}" id="id" name="id">
                                                        <input type="submit" name="btn" class="btn btn-danger w-100" value="X">
                                                    </form> 
                                                </td>
                                                @php
                                                    $total = $total + $libro->price * $libro->qty;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr class="fw-bolder">
                                            <td colspan="6"></td>
                                            <td class="text-end">Total</td>
                                            <td class="text-end">${{$total}}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <br>
                                <a href="{{route('clear')}}" class="btn - btn-danger w-100">Vaciar Carrito</a>
                            @else
                                <h2 class="text-center">No ha Añadido Libros Aún</h2>
                                <hr>
                                <a href="/" class="btn - btn-success w-100">Añadir Libros</a>
                            @endif
                        </div>
                   </div>
                <div>
            </div>
        </div>
    </div>
@endsection