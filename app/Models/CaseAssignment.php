<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAssignment extends Model
{
    use HasFactory;


protected $table = 'case_staff_assignment';

    protected $fillable = ['case_id', 'staff_id', 'assigned_at', 'assigned_by'];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }

    public function staff()
    {
        return $this->belongsTo(StaffModel::class, 'staff_id');
    }

    

}


