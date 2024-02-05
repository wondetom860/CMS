<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use \App\Models\

class Order extends Model
{
    use HasFactory;

    public static function validate($request){
        return $request->validate([
            "total"=> "required|numeric",
            "user_id"=> "required|exists:users,id",
        ]);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
