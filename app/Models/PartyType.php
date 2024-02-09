<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyType extends Model
{
    use HasFactory;
    public $table='party_type';

    protected $fillable = ['party_type_name', 'description'];

    public static function validate($request)
    {
        $request->validate([
            'party_type_name' => "required|max:255",
            'description' => "required",
        ]);
    }
}
