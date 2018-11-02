<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getAllProducts(){
        $products = Product::orderby('title', 'dsc')->paginate(100);
        return $products;
    }

    public function showProduct($id){
        $product = Product::find($id);
        return $product;
    }

    
}
