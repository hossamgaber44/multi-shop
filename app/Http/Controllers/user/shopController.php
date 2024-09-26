<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function getAllProduct(){
        $data['allProduct']=Product::all();
        return view('user.shop.shop')->with($data);
    }
    public function getProductOfCategory($id){
        $data['allProduct']=Product::where('category_id',$id)->get();
        return view('user.shop.shop')->with($data);
    }

    public function search(Request $Request){
        $products=Product::where('name','Like','%'.$Request->value.'%')->get();
        $output="";
        foreach($products as $product){
            $output.='
            <div  class="col-lg-4 col-md-6 col-sm-6 pb-1" >
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src='.asset('images/product'.'/'.$product->img).' alt="" />
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square"
                                href='. route('cart.add', $product->id) .'><i
                                class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square"
                                href='. route('Favorite.addToFavorite', $product->id).'><i
                                    class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href='.route('shop.shopDetails', $product->id).'> '.$product->name.' </a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$ '.($product->price * 50) / 100 .'</h5>
                            <h6 class="text-muted ml-2"><del>$'. $product->price .'</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5> '. $product->Category->name .'</h5>
                        </div>
                    </div>
                </div>
            </div>
            ';
        };

        // $data="<h1>test test tt</h1> " ;
        return response($output);
    }

}
