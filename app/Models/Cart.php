<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    use HasFactory;
    public $items =[] ;
    public $totalQty ;
    public $totalPrice ;
    public function __construct($cart = null)
        {
            if ($cart) {
                $this->items = $cart->items;
                $this->totalQty = $cart->totalQty;
                $this->totalPrice = $cart->totalPrice;
            } else {
                $this->items = [];
                $this->totalQty = 0;
                $this->totalPrice = 0;
            }
        }
    public function addItem($product ){
            $item=[
                'id' => $product->id,
                'name' =>$product->name,
                'price' =>$product->price,
                'descount' =>$product->descount,
                'qty' =>$product->qty,
                'image' =>$product->img,
                'color' =>$product->color,
                'size' =>$product->size,
            ];
            if(!array_key_exists($product->id,$this->items)){
                $this->items[$product->id] = $item;
                $this->totalQty += $product->qty;
                $this->totalPrice += ($product->price - ($product->price *($product->descount / 100 ))) * ($product->qty)  ;
            }else{
                $this->items[$product->id]['color'] = $product->color;
                $this->items[$product->id]['size'] = $product->size;
                $this->totalQty -= $this->items[$product->id]['qty'];
                $this->totalPrice -= ($this->items[$product->id]['price'] - ( $this->items[$product->id]['price'] * ($this->items[$product->id]['descount'] / 100 )))  * $this->items[$product->id]['qty'];
                $this->items[$product->id]['qty'] = $product->qty;
                $this->totalQty += $product->qty;
                $this->totalPrice += ($product->price - ($product->price *($product->descount / 100 ))) * ($product->qty)  ;
            };
    }

    public function removeFromCart($product_id){
            if (array_key_exists($product_id, $this->items)) {
                $this->totalQty -= $this->items[$product_id]['qty'];
                $this->totalPrice -= ( $this->items[$product_id]['price']-($this->items[$product_id]['price'] *($this->items[$product_id]['descount'] / 100 )) ) * $this->items[$product_id]['qty'];
                unset($this->items[$product_id]);
            }
            return $this;
        }

    public function decreaseItem($product_id){
            if (array_key_exists($product_id, $this->items)) {
                $this->items[$product_id]['qty'] -= 1;
                $this->totalQty -= 1;
                $this->totalPrice -= ( $this->items[$product_id]['price'] - ($this->items[$product_id]['price'] *($this->items[$product_id]['descount'] / 100 )) );

                if ($this->items[$product_id]['qty'] <= 0) {
                    unset($this->items[$product_id]);
                }
            }
            return $this;
        }

        public function increaseItem($product_id){
            if (array_key_exists($product_id, $this->items)) {
                $this->items[$product_id]['qty'] += 1;
                $this->totalQty += 1;
                $this->totalPrice += ( $this->items[$product_id]['price']-($this->items[$product_id]['price'] *($this->items[$product_id]['descount'] / 100 )) );
            }
            return $this;
        }


}



// public function updateQty($product_id ,$qty){
//     $this->totalQty -= $this->items[$product_id]['qty'];
//     $this->totalPrice -= $this->items[$product_id]['price'] * $this->items[$product_id]['qty'];

//     $this->items[$product_id]['qty']= $qty;

//     $this->totalQty += $qty;
//     $this->totalPrice += $this->items[$product_id]['price'] * $qty;
// }

// if($product->color == null && $product->size == null && $product->qty == null ){
//     $item=[
//         'id' => $product->id,
//         'name' =>$product->name,
//         'price' =>$product->price - ($product->price *($product->descount / 100 )),
//         'descount' =>$product->descount,
//         'qty' =>$product->qty,
//         'image' =>$product->img,
//         'color' =>$product->color,
//         'size' =>$product->size,
//     ];
//     if(!array_key_exists($product->id,$this->items)){
//         $this->items[$product->id] = $item;
//         $this->totalQty +=1;
//         $this->totalPrice += $product->price - ($product->price *($product->descount / 100 )) ;
//     }else{
//         $this->totalQty +=1;
//         $this->totalPrice += $product->price - ($product->price *($product->descount / 100 )) ;
//     };
//     $this->items[$product->id]['qty'] += 1;
//     }else{
