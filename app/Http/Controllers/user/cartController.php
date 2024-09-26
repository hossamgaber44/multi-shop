<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function showCart(){
        if(session()->has('cart')){
            $cart =new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('user.cart.cart',compact('cart'));
    }

    // public function addToCart(Product $product){
    //     if(session()->has('cart')){
    //         $cart =new Cart(session()->get('cart'));
    //     }else{
    //         $cart =new Cart();
    //     }
    //     $cart->addItem($product);
    //     // dd($cart);
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success','product was added');
    // }
    public function removeToCart(Product $product){
        $cart =new Cart(session()->get('cart'));
        $cart->removeFromCart($product->id);
        if($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
        };
        return redirect()->back()->with('success','product was added');
    }

    // public function changeToCart(Request $product){
    //     $product->validate([
    //         'id' => 'required',
    //         'qty' => 'required|numeric',
    //     ]);
    //     $cart =new Cart(session()->get('cart'));
    //     $cart->updateQty($product->id,$product->qty);
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success','product was added');
    // }

    public function decreaseItemToCart(Product $product){
        $cart =new Cart(session()->get('cart'));
        $cart->decreaseItem($product->id);
        if($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
        };
        return redirect()->back()->with('success','product was decrease');
    }

    public function increaseItemToCart(Product $product){
        if(session()->has('cart')){
            $cart =new Cart(session()->get('cart'));
        }else{
            $cart =new Cart();
        }
        $cart->increaseItem($product->id);
        // dd($cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success','product was added');
    }

    public function addNewToCart(Request $r ){
        $validator=FacadesValidator::make($r->all(),[
            'id' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($r->all());
        }

        $product=Product::findOrFail($r->id);

        if(session()->has('cart')){
            $cart =new Cart(session()->get('cart'));
        }else{
            $cart =new Cart();
        }
        $product->color = $r->color;
        $product->size = $r->size;
        $product->qty = $r->qty;
        $cart->addItem($product);
        session()->put('cart', $cart);
        return redirect()->back()->with('success','product was added');
    }

}
