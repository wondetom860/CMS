<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
