@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

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
                                    <img src="/img/{{ $libro->imagen }}"
                                        class="card-img-top mx-auto"
                                        style="height: 150px; width: 150px;display: block;"
                                        alt="{{ $libro->imagen }}"
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