<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function index(){
        $data['orders']=Order::where('payment_status', '1' )->get();
            return view('admin.orders.index')->with($data);
    }

    public function delete($id){

        Order::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function processingOrder($order_id)
    {
        Order::findOrFail($order_id)->update([
            "status" => "processing"
        ]);

        return redirect()->back();
    }

    public function shippedOrder($order_id)
    {
        Order::findOrFail($order_id)->update([
            "status" => "shipped"
        ]);

        return redirect()->back();
    }

    public function orderDetails($id){
        $data['orderDetails']=OrderDetails::where('order_id',$id)->get();
        return view('admin.orders.orderDetails')->with($data);
    }

}
