<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class shopFilterController extends Controller
{
    public function filterdata(Request $r){
        $price=$r->value['price'];
        $color=$r->value['color'];
        $size=$r->value['size'];
        $priceAll= (in_array('all',$price));
        $colorAll= (in_array('all',$color));
        $sizeAll= (in_array('all',$size));
        $data=[];
        $output="";

        // 0 0 0
        if(!$priceAll && !$colorAll && !$sizeAll  ){
            $maxPrice=max($price);
            $minPrice=min($price)-100;
            $minPrice= $maxPrice == $minPrice ? $maxPrice - 100 : $minPrice ;
            $data=Product::where('price','>',$minPrice)->where('price','<',$maxPrice)
            ->whereHas('ProductColor',function($q) use ($color){
                $q->whereIn('color',$color);
            })
            ->whereHas('ProductSize',function($q) use ($size){
                $q->whereIn('size',$size);
            })->get();
        }
                // 1 0 0
        elseif($priceAll && !$colorAll && !$sizeAll  ){
            $data=Product::whereHas('ProductColor',function($q) use ($color){
                $q->whereIn('color',$color);
            })
            ->whereHas('ProductSize',function($q) use ($size){
                $q->whereIn('size',$size);
            })->get();
        }
                // 0 1 0
        elseif(!$priceAll && $colorAll && !$sizeAll  ){
            $maxPrice=max($price);
            $minPrice=min($price)-100;
            $minPrice= $maxPrice == $minPrice ? $maxPrice - 100 : $minPrice ;
            $data=Product::where('price','>',$minPrice)->where('price','<',$maxPrice)
            ->whereHas('ProductSize',function($q) use ($size){
                $q->whereIn('size',$size);
            })->get();
        }
                // 1 1 0
        elseif($priceAll && $colorAll && !$sizeAll  ){
            $data=Product::whereHas('ProductSize',function($q) use ($size){
                $q->whereIn('size',$size);
            })->get();
        }
                // 0 0 1
        elseif(!$priceAll && !$colorAll && $sizeAll  ){
            $maxPrice=max($price);
            $minPrice=min($price)-100;
            $minPrice= $maxPrice == $minPrice ? $maxPrice - 100 : $minPrice ;
            $data=Product::where('price','>',$minPrice)->where('price','<',$maxPrice)
            ->whereHas('ProductColor',function($q) use ($color){
                $q->whereIn('color',$color);
            })->get();
        }
                // 1 0 1
        elseif($priceAll && !$colorAll && $sizeAll  ){
            $data=Product::whereHas('ProductSize',function($q) use ($size){
                $q->whereIn('size',$size);
            })->get();
        }
                // 0 1 1
        elseif(!$priceAll && $colorAll && $sizeAll  ){
            $maxPrice=max($price);
            $minPrice=min($price)-100;
            $minPrice= $maxPrice == $minPrice ? $maxPrice - 100 : $minPrice ;
            $data=Product::where('price','>',$minPrice)->where('price','<',$maxPrice)->get();
        }
                // 1 1 1
        else{
            $data=Product::all();
        };

        if(count($data) == 0){
            $output='<div class="d-flex align-items-center justify-content-center mt-3 ml-5">
                        <h5> data not found </h5>
                    </div>';
        }else{
            foreach($data as $product){
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
        };
        return response($output);
    }
}
