<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $guarded =['id'];

    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function ProductColor(){
        return $this->hasMany('App\Models\products_color');
    }
    public function ProductSize(){
        return $this->hasMany('App\Models\products_size');
    }
    
    public function ProductImages(){
        return $this->hasMany('App\Models\product_image');
    }
}
