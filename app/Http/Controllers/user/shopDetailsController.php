<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class shopDetailsController extends Controller
{
    public function shopDetails($id){
        $data['product']=Product::where('id',$id)->first();
        return view('user.shopDetails.shopDetails')->with($data);
    }
}
