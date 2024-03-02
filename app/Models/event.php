<?php

namespace App\Models;

use Andegna\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class event extends Model
{
    use HasFactory;


    protected $fillable = ['case_id', 'event_type_id', 'date_time', 'location', 'out_come'];

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

    public static function getMyActiveCaseEvent($user)
    {
        return self::query()
            ->join('case', 'case.id', '=', 'events.case_id')
            ->join('case_staff_assignment', 'case.id', '=', 'case_staff_assignment.case_id')
            ->join('court_staff', 'court_staff.id', '=', 'case_staff_assignment.court_staff_id')
            ->where(
                'court_staff.person_id',
                $user->person_id
            )
            ->where('date_time', 'like', str(date('Y-m-d')) . "%")
            ->groupBy('case_id')
            ->count();
    }
    public function getDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime(date_create($this->date_time));
            // $gregorian = date_create($this->created_at);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return date_format(date_create($this->date_time), "d/m/Y");
        }
    }

    public function validDate()
    {
        $now = time();
        $schedDatetime = strtotime($this->date_time);
        return($schedDatetime > $now) && ($schedDatetime < $now + (86400 * 14));
    }

    public function case()
    {
        return $this->belongsTo(CaseModel::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDetail()
    {
        return $this->case->case_number;
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function archives()
    {
        return $this->hasMany(CaseArchive::class, 'event_id');
    }
}
