<?php

namespace App\Models;

use Andegna\Constants;
use Andegna\DateTime;
use Andegna\DateTimeFactory;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CaseModel extends Model
{
    use HasFactory;

    // use SoftDeletes;

    // protected $dates = ['deleted_at'];
    // public $searchBy = ['case_number', 'report_date'];
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

    public function scopeFilter($model, $filters)
    {
        // dd($filters['start_date']);
        if (isset($filters['start_date'])) {
            $model->where('start_date', '>=', $filters['start_date']);
        }
        // dd($filters['start_date']);
        return $model;
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

    public function publicity()
    {
        return $this->case_public ? 'Public' : 'Closed';
    }
    public function getDefendant()
    {
        $defendants = $this->parties()->where(['party_type_id' => $this->getParty('defendant')])->get();
        return $this->formatAndReturn($defendants);
    }

    public function getDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime($this->created_at);
            // $gregorian = date_create($this->created_at);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return $this->created_at;
        }
    }

    public static function getUnAssignedStaff($case_id)
    {
        $case = CaseModel::findOrFail($case_id);
        $unAssignedDate = CourtStaff::whereNotIn('id', DB::table('case_staff_assignment')->where('case_id', '=', $case->id)->pluck('court_staff_id'))
            ->get();
        // dd($unAssignedDate);
        return $unAssignedDate;
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
        $event = $this->events()->orderBy('date_time', 'desc')->first(); //3=>SORT_DESC
        if ($event) {
            return $event->eventType->event_type_name;
        } else {
            return "No event.";
        }
    }

    public function getLastEvent()
    {
        $lEvent = $this->events()->orderBy('id', 'desc')->first();

        if ($lEvent) {
            return [$lEvent->getDate(), $lEvent->eventType->event_type_name];
        }
        return ['', ''];
    }

    public function getCaseStatus()
    {
        return $this->case_status == self::STATUS_ACTIVE ? __("ACTIVE") : ($this->case_status == self::STATUS_READY ? __("Ready") : __("Completed"));
    }

    public static function getReport($report_type)
    {
        if ($report_type == 1) {
            // cases registered today
            return CaseModel::where('start_date', 'like', str(date('Y-m-d')) . "%")->orderBy('start_date', 'desc')->get();
        } elseif ($report_type == 2) {
            // cases registered in this week
            $start_date = strtotime(date("Y-m-d")) - 5 * 86400;
            $end_date = strtotime(date("Y-m-d"));
            // return CaseModel::whereBetween('start_date', [date("Y-m-d", $start_date), date("Y-m-d", $end_date)])->orderBy('start_date','desc')->get();
            return CaseModel::whereBetween('start_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy('start_date', 'desc')->get();
        } elseif ($report_type == 3) { //last 3 month
            $start_date = strtotime(date("Y-m-d")) - 3 * 30 * 86400;
            $end_date = strtotime(date("Y-m-d"));
            return CaseModel::whereBetween('start_date', [date("Y-m-d", $start_date), date("Y-m-d", $end_date)])->orderBy('start_date', 'desc')->get();
        } elseif ($report_type == 4) { //last 6 month
            $start_date = strtotime(date("Y-m-d")) - 6 * 30 * 86400;
            $end_date = strtotime(date("Y-m-d"));
            return CaseModel::whereBetween('start_date', [date("Y-m-d", $start_date), date("Y-m-d", $end_date)])->orderBy('start_date', 'desc')->get();
        } elseif ($report_type == 5) { //last 1 year
            $start_date = strtotime(date("Y-m-d")) - 12 * 30 * 86400;
            $end_date = strtotime(date("Y-m-d"));
            return CaseModel::whereBetween('start_date', [date("Y-m-d", $start_date), date("Y-m-d", $end_date)])->orderBy('start_date', 'desc')->get();
        }
    }

    public static function getTodayRegisteredCases()
    {
        $today = date("Y-m-d");
        $records = CaseModel::where('start_date', 'like', $today . "%")->get();
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
    public static function getOpenCaseTrials() //cases scheduled for today
    {
        // , 'event.date_time' => date('Y-m-d')
        return CaseModel::where('case_public', self::CASE_PUBLIC)
            ->join('events', 'case.id', '=', 'events.case_id')
            ->where('events.date_time', '<>', NULL)
            ->where('events.date_time', 'like', str(date('Y-m-d')) . "%")
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

    public static function getMyActiveCases($userId = null)
    {
        // returns counts of active cases - non-terminated
        return self::query()
            ->join('case_staff_assignment', 'case.id', '=', 'case_staff_assignment.case_id')
            ->join('court_staff', 'court_staff.id', '=', 'case_staff_assignment.court_staff_id')
            ->where('court_staff.person_id', Auth::user()->person_id)
            ->count();
    }

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
    public function archives()
    {
        return $this->hasMany(CaseArchive::class, 'case_id');
    }
}
