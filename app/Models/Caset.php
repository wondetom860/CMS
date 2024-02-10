<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caset extends Model
{
    use HasFactory;
    public function caseStaffAssignments()
    {
        return $this->hasMany(Caset::class);
    }
}
