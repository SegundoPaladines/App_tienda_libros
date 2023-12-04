<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add(Request $req){
        $libro = Libro::find($req->id);
        if (empty($libro)){
            return redirect('/');
        }
        
        Cart::add([
            'id' => $libro->id,
            'name' => $libro->nombre,
            'price' => $libro->precio,
            'qty' => 1,
            'options' => [
                'image' => $libro->imagen,
                'year' => $libro->pub_year,
                'autor' => $libro->autor,
                'editorial'=>$libro->editorial,
            ],
        ]);        

        return redirect()->back()->with("success","Libro ". $libro->nombre. "Agregado con Exito");

    }
    public function checkout(){
        return view('front.cart.checkout');
    }
    public function remove(Request $req){
        Cart::remove($req->id);
        return redirect()->back()->with("success","Libro Eliminado del Carrito con Exito");
    }
    public function clear(){
        Cart::destroy();
        return redirect()->back()->with("success","Carrito Vaciado");
    }
    public function increment(Request $req){
        $item = Cart::get($req->id);
        $qty = $item->qty+1;
        Cart::update($req->id, $qty);
        return redirect()->back();
    }
    public function decrement(Request $req){
        $item = Cart::get($req->id);
        $qty = $item->qty-1;
        Cart::update($req->id, $qty);
        return redirect()->back();
    }
}
