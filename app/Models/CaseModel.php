<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    use HasFactory;

    protected $fillable = ['case_number', 'cause_of_action', 'court_id', 'case_status','case_type_id','start_date','end_date'];

    public $table='case';
    public static function validate($request)
    {
        $request->validate([
            'case_number' => "required|numeric|gt:0",
            'cause_of_action' => "required",
            'court_id' => "required|exists:courts,id",
            'case_status' => "required",
            'case_type_id' => "required|exists:case_type,id",
            'start_date' => "required",
            'end_date' => "required",
            
        ]);
    }

    
}
