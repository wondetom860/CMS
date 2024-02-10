<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state', 'city', 'zip'];

    public static function validate($request)
    {
        $request->validate([
            'name' => "required|max:255",
            'state' => "required|max:255",
            'city' => "required|max:255",
            'zip' => "max:15",
        ]);
    }

    public function getDetail(){
        return $this->name;
    }

    public function getActiveCases(){
        // returns counts of active cases
        return 0;
    }

    public function CaseModel(){
        return $this->hasMany(CaseModel::class);
    }
    
}
