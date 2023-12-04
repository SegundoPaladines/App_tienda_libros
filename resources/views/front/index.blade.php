@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 5px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                    @include('front.partials.msg')
                        @foreach($libros as $libro)
                            <div class="col-lg-3">
                                <div class="card" style="margin-bottom: 20px; height: auto;">
                                    <img src="{{Storage::url($libro->imagen)}}"
                                        class="card-img-top mx-auto"
                                        style="height: 150px; width: 150px;display: block;"
                                        alt="{{ Storage::url($libro->imagen) }}"
                                    >
                                    <div class="card-body">
                                        <a href=""><h6 class="card-title">{{ $libro->nombre }}</h6></a>
                                        <p>${{ $libro->precio }}</p>
                                        <form action="{{ route('add') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $libro->id }}" id="id" name="id">
                                            <div class="card-footer" style="background-color: white;">
                                                <div class="row">
                                                    <input type="submit" name="btn" class="btn btn-secondary btn-sm" value="Añadir al Carrito">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection