<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffrole extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['role_name', 'rank', 'description'];
    public $table = 'staff_role';
    public static function validate($request)
    {
        $request->validate([
            'role_name' => "required|max:255",
            'rank' => "required|max:255",
            'description' => "required|max:255",
        ]);
    }
}


