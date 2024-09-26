<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function getCheckoutPage(){
        if(session()->has('cart')){
            $cart =new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('user.checkout.checkout',compact('cart'));
    }
}
