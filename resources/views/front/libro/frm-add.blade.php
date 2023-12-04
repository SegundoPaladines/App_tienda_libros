@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @include('front.partials.msg')
                    <div class="card-body text-center">
                        <h1>Crear Nuevo Libro</h1>
                    </div>
                    <form method="post" action="{{ route('add-libro') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="container mb-4">
                            <div class="row">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="autor">Autor:</label>
                                    <input type="text" id="autor" name="autor" class="form-control" required value="{{ old('autor') }}">
                                    @error('autor')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="editorial">Editorial:</label>
                                    <input type="text" id="editorial" name="editorial" class="form-control" required value="{{ old('editorial') }}">
                                    @error('editorial')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="pub_year">Año de Publicación:</label>
                                    <input type="number" id="pub_year" name="pub_year" class="form-control" required value="{{ old('pub_year') }}">
                                    @error('pub_year')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="number" id="precio" name="precio" step="0.01" class="form-control" required value="{{ old('precio') }}">
                                    @error('precio')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="imagen">Imagen:</label>
                                    <input type="file" id="imagen" name="imagen" class="form-control-file" required>
                                    @error('imagen')
                                        <div class="alert alert-danger text-center">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Guardar Libro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection