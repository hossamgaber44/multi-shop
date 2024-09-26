<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite
{
    use HasFactory;

    public $items =[] ;
    public $totalCount ;

        public function __construct($favorite = null)
            {
                if ($favorite) {
                    $this->items = $favorite->items;
                    $this->totalCount = $favorite->totalCount;
                } else {
                    $this->items = [];
                    $this->totalCount = 0;
                }
            }
        public function addItem($product ){
            $item=[
                'id' => $product->id,
                'name' =>$product->name,
                'price' =>$product->price,
                'rating' =>$product->rating,
                'image' =>$product->img,
            ];
            if(!array_key_exists($product->id,$this->items)){
                $this->items[$product->id] = $item;
                $this->totalCount +=1;
            };
        }
        public function removeFromFavorite($product_id){
            if (array_key_exists($product_id, $this->items)) {
                $this->totalCount -= 1;
                unset($this->items[$product_id]);
            }
            return $this;
        }
        
}
