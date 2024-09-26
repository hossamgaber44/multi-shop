<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class favoriteController extends Controller
{
    public function showFavorite(){  
        if(session()->has('favorite')){
            $favorite =new Favorite(session()->get('favorite'));
        }else{
            $favorite = null;
        }
        return view('user.favorite.favorite',compact('favorite'));
    }

    public function addToFavorite(Product $product){    
        if(session()->has('favorite')){
            $favorite =new Favorite(session()->get('favorite'));
        }else{
            $favorite =new Favorite();
        }
        $favorite->addItem($product);
        session()->put('favorite', $favorite);
        return redirect()->back()->with('success','product was added');
    }

    public function removeToFavorite(Product $product){   
        $favorite =new Favorite(session()->get('favorite'));
        $favorite->removeFromFavorite($product->id);
        if($favorite->totalCount <= 0){
            session()->forget('favorite');
        }else{
            session()->put('favorite', $favorite);
        };
        return redirect()->back()->with('success','product was removed');
    }

}
