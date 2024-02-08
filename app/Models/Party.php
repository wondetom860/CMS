<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['case_id', 'person_id', 'party_type_id'];
    public $table = 'party';
    public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|max:255",
            'person_id' => "required|max:255",
            'party_type_id' => "required|max:255",
        ]);
    }
}
