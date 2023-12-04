<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class FrontController extends Controller
{
    public function index(){
        $libros = Libro::all();
        return view('front.index')->with(['libros' => $libros]);
    }
}
