<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CaseModel extends Model
{
    use HasFactory;
    const STATUS_CLOSED = 2;
    const STATUS_READY = 0;
    const STATUS_ACTIVE = 1;

    //protected $fillable = ['case_number','start_date',];

    public $table = 'case';
    public static function validate($request)
    {
        $request->validate([
            'case_number' => "required|numeric|gt:0",
            'cause_of_action' => "required",
        ]);
    }

    public function isActive()
    {
        return $this->case_status != self::STATUS_CLOSED;
    }

    public function canRegisterParty(){
        // $usr = User::find(Auth::user()->id);
        // $courtStaff = CourtStaff::where(['person_id' => $usr->person_id])->get()->first();
        // $court_staff_id = $courtStaff ? $courtStaff->id : null;
        // return $this->caseStaffAssignments()->where(['court_staff_id' => $court_staff_id])->count() > 0;
    }

    public function isAssignedTo($person_id)
    {
        $usr = User::where(['person_id' => $person_id])->get()->first();
        if($usr->isClient()){
            return false;
        }
        $courtStaff = CourtStaff::where(['person_id' => $person_id])->get()->first();
        $court_staff_id = $courtStaff ? $courtStaff->id : null;
        return $this->caseStaffAssignments()->where(['court_staff_id' => $court_staff_id])->count() > 0;
    }

    public function getCsaId()
    {
        $courtStaffMoel = CourtStaff::where(['person_id' => Auth::user()->person_id])->get()->first();
        if ($courtStaffMoel) {
            $csa = $this->caseStaffAssignments;
            foreach ($csa as $cs) {
                if ($cs->court_staff_id == $courtStaffMoel->id) {
                    return $cs->id;
                }
            }
        }

    }

    public function getCaseNumber()
    {
        return "MODCCMS/" . $this->court_id . "/" . str_pad(rand(99, 10000), 4, "0");
    }

    public function caseStaffAssignments()
    {
        return $this->hasMany(Case_Staff_Assignment::class, 'case_id');
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
        return $this->hasMany(Document::class, 'case_id');
    }
    public function events()
    {
        return $this->hasMany(event::class, 'case_id');
    }

    public function staffs()
    {
        return $this->hasMany(Case_Staff_Assignment::class, 'case_id');
    }

    public function parties()
    {
        return $this->hasMany(Party::class, 'case_id');
    }


    public function eventType()
    {
        return $this->hasMany(EventType::class);
    }
}
