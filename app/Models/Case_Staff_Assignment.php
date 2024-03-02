<?php

namespace App\Models;

// use Illuminate\Contracts\Mail\Mailer;

use Andegna\DateTime;
use App\Mail\staffAssignment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

// use Mail;

class Case_Staff_Assignment extends Model
{
    use HasFactory;
    public $table = 'case_staff_assignment';
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
            'court_staff_id' => "required|:255",
            'assigned_as' => "required|max:255",
            'assigned_at' => "required|date",
            'assigned_by' => "numeric|gt:0",
        ]);
    }

    public function notifyStaff()
    {
        $email = $this->courtStaff->person->getEmail();
        if ($email) {
            Mail::to($email)->send(new staffAssignment($this));
        } else {
            // $st = 
            notify()->warning('User Email is not known');
        }
    }

    public function getAssignedDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime(date_create($this->assigned_at));
            // $gregorian = date_create($this->assigned_at);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return date_format(date_create($this->assigned_at), 'd/m/Y');
        }
    }

    public static function staffAssigned($court_staff_id, $case_id): bool
    {
        return self::where(['case_id' => $case_id, 'court_staff_id' => $court_staff_id])->count() > 0;
    }

    public function checkIfAssigned(): bool
    {
        return self::staffAssigned($this->court_staff_id, $this->case_id);
    }

    // Define relationships
    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function courtStaff()
    {
        return $this->belongsTo(CourtStaff::class, 'court_staff_id');
    }

    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDetail()
    {
        return $this->case->case_number;
    }
}
