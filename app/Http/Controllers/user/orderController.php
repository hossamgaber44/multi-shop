<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function orders(){
        $user_id= Auth::user()->id;
        // return $user_id ;
        $data['orders']=Order::where('user_id',$user_id)->where('payment_status', '1' )->get();
        return view('user.orders.orders')->with($data);
    }

    public function orderDetails($id){
        $data['orderDetails']=OrderDetails::where('order_id',$id)->get();
        return view('user.orders.orderDetails')->with($data);
    }

}
