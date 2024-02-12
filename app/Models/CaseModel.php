<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    use HasFactory;

    //protected $fillable = ['case_number','start_date',];

    public $table = 'case';
    public static function validate($request)
    {
        $request->validate([
            'case_number' => "required|numeric|gt:0",
            'cause_of_action' => "required",
        ]);
    }

    public function getCaseNumber()
    {
        return "MODCCMS/" . $this->court_id . "/" . str_pad(rand(99, 10000), 4, "0");
    }
    public function caseType()
    {
        return $this->belongsTo(CaseType::class);
    }

    public function getStatus()
    {
        return $this->status == 2 ? "Terminated" : "Active";
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

}
