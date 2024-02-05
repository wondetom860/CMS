<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use \App\Models\

class MyAccount extends Model
{

    public $name = '';

    public $oldPassword = '';
    public $newPassword = '';
    public $confirmNewPassword = '';
    

    public static function validate($request){
        return $request->validate([
            "name"=> "required|string",
            "confirmNewPassword"=> "required|match:newPassword",
        ]);
    }
    
}
