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

    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDetail()
    {
        return $this->case_number;
    }

    // public function getActiveCases()
    // {
    //     // returns counts of active cases - non-terminated
    //     return count($this->CaseModel()->where('case_status','<>',2)->get());
    // }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class,'case_id');
    }
    public function events()
    {
        return $this->hasMany(event::class,'case_id');
    }

    public function staffs()
    {
        return $this->hasMany(Case_Staff_Assignment::class,'case_id');
    }
   
    public function eventType()
    {
        return $this->hasMany(EventType::class);
    }

}
