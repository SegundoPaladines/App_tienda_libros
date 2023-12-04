<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Validator;


class LibroController extends Controller
{
    public function list(){
        $libros = Libro::all();
        return view('front.libro.list', compact('libros'));
    }

    public function eliminar($id){
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return redirect()->back()->with("success","Libro eliminado con Exito");
    }

    public function addView(){
        return view('front.libro.frm-add');
    }

    public function add(Request $req){
        $validator = Validator::make($req->all(), [
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'pub_year' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|max:10240',
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'autor.required' => 'El campo Autor es obligatorio.',
            'editorial.required' => 'El campo Editorial es obligatorio.',
            'pub_year.required' => 'El campo Año de Publicación es obligatorio.',
            'pub_year.integer' => 'El campo Año de Publicación debe ser un número entero.',
            'precio.required' => 'El campo Precio es obligatorio.',
            'precio.numeric' => 'El campo Precio debe ser un número.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.max' => 'La imagen no debe superar los 10240 kilobytes (10 MB).',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $libro = new Libro();
        $libro->nombre = $req->nombre;
        $libro->autor = $req->autor;
        $libro->editorial = $req->editorial;
        $libro->pub_year = $req->pub_year;
        $libro->precio = $req->precio;
        $libro->descripcion = $req->descripcion;
        $libro->categoria = 1;

        $imagen = $req->file('imagen');
        if ($imagen !== null && $imagen->isValid()) {
            $rutaFoto = $imagen->store('public/img');
            $libro->imagen = $rutaFoto;
        }
    
        $libro->save();
        
        return redirect()->back()->with('success', 'Libro ' . $libro->nombre . ' agregado exitosamente');
    }
    
}
