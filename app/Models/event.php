<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    

    protected $fillable = ['case_id', 'event_type_id','date_time','location','out_come'];

    public $table = 'events';

    public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|max:255",
            'event_type_id' => "required|max:255",
            'date_time' => "required|max:255",
            'location' => "required|max:255",
            'out_come' => "max:255",
        ]);
    }
}