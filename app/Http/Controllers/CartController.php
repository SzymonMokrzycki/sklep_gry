<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }
    
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "title" => $product->title,
                        "quantity" => $product->count,
                        "quantity1" => $product->count,
                        "price" => $product->price,
                        "photo" => $product->image,
                        "desc" => $product->desc,
                        "platform" => $product->platform,
                        "id" => $id
                    ]
            ];
            session()->put('cart', $cart);
            return view('cart');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return view('cart');        
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => 1,
            "quantity1" => $product->count,
            "price" => $product->price,
            "photo" => $product->image,
            "desc" => $product->desc,
            "platform" => $product->platform,
            "id" => $id
        ];
        session()->put('cart', $cart);
        return view('cart');    
    }

    public function addToCart1($id, $c)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "title" => $product->title,
                        "quantity" => $c,
                        "price" => $product->price,
                        "photo" => $product->image,
                        "desc" => $product->desc,
                        "platform" => $product->platform,
                        "id" => $id
                    ]
            ];
            session()->put('cart', $cart);
            return view('cart');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return view('cart');        
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => $c,
            "price" => $product->price,
            "photo" => $product->image,
            "desc" => $product->desc,
            "platform" => $product->platform,
            "id" => $id
        ];
        session()->put('cart', $cart);
        return view('cart');    
    }

    public function removeProduct($id){
        $c = session()->get('cart');
        if(isset($c[$id])) {
            unset($c[$id]);
            session()->put('cart', $c);
        }
        if($c == null)
            session()->forget('cart');
        return view('cart');
    }

    public function clear(){
        session()->forget('cart');
        return view('cart');
    }
}
