<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public static function validate($request){
        return $request->validate([
            "price"=> "numeric|required|gt:0",
            "quantity"=> "required|numeric|gt:0",
            "product_id"=> 'required|exists:products,id',
            'order_id'=> 'required|exists"orders,id',
        ]);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
