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

    const CASE_PUBLIC = 1;
    const CASE_CLOSED = 0;

    //protected $fillable = ['case_number','start_date',];

    public $table = 'case';
    public static function validate($request)
    {
        $request->validate([
            'case_number' => "required|numeric|gt:0",
            'cause_of_action' => "required",
        ]);
    }

    protected function getParty($partyType)
    {
        $ptiff = PartyType::where(['party_type_name' => strtoupper($partyType)])->get()->first();
        return $ptiff ? $ptiff->id : $ptiff;
    }


    public function getPlaintiff()
    {
        $plaintiffs = $this->parties()->where(['party_type_id' => $this->getParty('plaintiff')])->get();
        return $this->formatAndReturn($plaintiffs);
    }

    private function formatAndReturn($party)
    {
        if ($party && count($party) > 0) {
            $count = count($party);
            $fPerson = $party[0]->person->getFullName();
            if ($count > 1) {
                return $fPerson . " and " . ($count - 1) . " others";
            } else {
                return $fPerson;
            }
        }
        return "-";
    }
    public function getDefendant()
    {
        $defendants = $this->parties()->where(['party_type_id' => $this->getParty('defendant')])->get();
        return $this->formatAndReturn($defendants);
    }
    public function getEventSceduleForToday()
    {
        $todayEvent = $this->events()->where(['date_time' => date('Y-m-d')])->get()->first();

        if ($todayEvent) {
            return $todayEvent->date_time;
        } else {
            $event = $this->events()->orderBy('date_time')->get()->first(); //3=>SORT_DESC
            if ($event) {
                return $event->date_time;
            }
        }
    }
    public function getEventType()
    {
        $event = $this->events()->orderBy('date_time')->get()->first(); //3=>SORT_DESC
        if ($event) {
            return $event->eventType->event_type_name;
        } else {
            return "No event.";
        }
    }

    public static function getTodayRegisteredCases(){
        $today = date("Y-m-d");
        $records = CaseModel::where(['start_date' => $today])->get();
        return count($records);
    }

    public function isActive()
    {
        return $this->case_status != self::STATUS_CLOSED;
    }

    public function canRegisterParty()
    {
        // $usr = User::find(Auth::user()->id);
        // $courtStaff = CourtStaff::where(['person_id' => $usr->person_id])->get()->first();
        // $court_staff_id = $courtStaff ? $courtStaff->id : null;
        // return $this->caseStaffAssignments()->where(['court_staff_id' => $court_staff_id])->count() > 0;
    }
    public static function getOpenCaseTrials()
    {
        // , 'event.date_time' => date('Y-m-d')
        return CaseModel::with(['caseStaffAssignments', 'parties', 'events'])
            // ->join('event')
            ->where(['case_public' => self::CASE_PUBLIC])
            ->get();
    }
    public function isAssignedTo($person_id)
    {
        $usr = User::where(['person_id' => $person_id])->get()->first();
        if ($usr->isClient()) {
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
}
