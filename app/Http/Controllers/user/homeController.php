<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
// use Cartalyst\Stripe\Laravel\Facades\Stripe ;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        // $data['offers']=Product::latest()->take(6)->get();
        // $data['sliderProduct']=Product::latest()->take(12)->get();

        $data['categories']=Category::latest()->take(8)->get();
        $data['products']=Product::latest()->take(8)->get();
        return view('user.index')->with($data);
    }





















    public function checkOut($amount){
        return  view('user.checkout',compact('amount'));
    }

    // public function charge(Request $r){
    //     // dd($r->stripeToken);
    //     $charge=Stripe::charges()->create([
    //         'currency' =>'USD',
    //         'source'=>$r->stripeToken,
    //         'amount'=>$r->amount,
    //         'description' => 'success'

    //     ]);
    //     $chargeId=$charge['id'];
    //     if($chargeId){
    //         return redirect()->route('user.index');
    //     }else{
    //         return redirect()->back();
    //     }

    // }

}
