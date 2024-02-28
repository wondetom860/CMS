<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeCourtStaff extends Model
{
    use HasFactory;

    protected $table = 'change_court_staff';

    public function caseStaffAssignment()
    {
        return $this->belongsTo(Case_Staff_Assignment::class, 'csa_id');
    }

    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
