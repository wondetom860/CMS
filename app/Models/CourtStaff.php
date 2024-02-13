<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourtStaff extends Model
{
    use HasFactory;

    protected $fillable = ['role_name', 'rank', 'description'];
    public $table = 'court_staff';
    public static function validate($request)
    {
        $request->validate([
            'court_id' => "required|max:255",
            'person_id' => "required|max:255",
            'staff_role_id' => "required|max:255",

        ]);
    }
    public function getStaffDetail()
    {
        return $this->person->getFullName();
    }
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
    public function staffrole()
    {
        return $this->belongsTo(Staffrole::class, 'id');
    }
    public function caseStaffAssignments()
    {
        return $this->hasMany(Caset::class, 'court_staff_id');
    }
}
