<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourtStaff extends Model
{
    use HasFactory;

    // Define relationships
    public function caseStaffAssignments()
    {
        return $this->hasMany(Caset::class, 'court_staff_id');
    }
}

