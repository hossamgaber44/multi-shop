<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function getProducts( $categoryId ){
        $data['products']=Product::where('category_id',$categoryId)->paginate(3);
        return view('user.products.products')->with($data);
    }

    public function productDetails($id){
        $data['productDetails']=Product::select('id', 'category_id', 'small_desc', 'desc', 'name', 'img', 'price', 'brand')->where('id',$id)->first();
        return view('user.page.productDetails')->with($data);
    }

}
