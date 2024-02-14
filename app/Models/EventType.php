<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;

    public $table="event_type";

    protected $fillable = ['event_type_name', 'description'];

    public static function validate($request)
    {
        $request->validate([
            'event_type_name' => "required|max:255",
            'description' => "required",
        ]);
    }

    public function events(){
        return $this->hasMany(event::class);
    }
}
