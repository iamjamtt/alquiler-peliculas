<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Cart;

class CartClienteController extends Controller
{
    public function add(Request $request)
    {
        $pelicula = Pelicula::find($request->id);
        $items = Cart::getContent();
        foreach ($items as $item) {
            if ($item->id == $request->id) {
                return redirect()->back()->with('error', 'La pelicula ya se encuentra en el carrito');
            }
        }
        Cart::add(
            $pelicula->id,
            $pelicula->pelicula_descripcion,
            $pelicula->pelicula_monto,
            1,
            array('urlfoto'=>$pelicula->pelicula_imagen)
        );
        return redirect()->back()->with('success', 'La pelicula '.$pelicula->pelicula_descripcion.' se agrego correctamente al carrito');
    }

    public function cart()
    {
        return view('vista-cliente.cart.checkout');
    }

    public function clear()
    {
        Cart::clear();
        return redirect()->back()->with('success','Carrito vacio satisfactoriamente');
    }
    
    public function removeitem(Request $request)
    {
        Cart::remove([
            'id'=>$request->id
        ]);
        return redirect()->back()->with('success','Pelicula eliminada satisfactoriamente');
    }
}
