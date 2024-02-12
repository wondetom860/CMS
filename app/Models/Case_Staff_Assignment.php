<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Case_Staff_Assignment extends Model
{
    use HasFactory;
public $table= 'case_staff_assignment';
    protected $fillable = [
        'case_id',
        'court_staff_id',
        'assigned_as',
        'assigned_at',
        'assigned_by',
    ];


 public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|max:255",
            'court_staff_id'=>"required|:255",
            'assigned_as' => "required|max:255",
            'assigned_at'=> "required|date",
            'assigned_by'=> "max:255",
        ]);
    }



    // Define relationships
    public function caset()
    {

        return $this->belongsTo(Caset::class);
    }

    public function courtStaff()
    {
        return $this->belongsTo(CourtStaff::class);
    }
}
