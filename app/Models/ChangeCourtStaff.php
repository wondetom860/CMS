<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeCourtStaff extends Model
{
    use HasFactory;

    protected $table = 'change_court_staff';
    protected $fillable = [
            'id',
        'csa_id',
        'terminated_reason',
        'requestd_at',
        'requested_by',
        'request_accepted',
        'request_accepted_at',
        'approval_status',
        'approved_at',
        'approved_by',
        'remark',
        'created_at',
        'updated_at',
    ];

    public static function getRequests(){
        return self::where(['approval_status' => 0])->count();
    }

    public function caseStaffAssignment(){
        return $this->belongsTo(Case_Staff_Assignment::class,'csa_id');
    }

    // public function caseStaffAssignment()
    // {
    //     return self::where(['csa_id' => $csa_id, 'requested_by' => $requested_by])->count() > 0;
    //     // return $this->belongsTo(CaseStaffAssignment::class, 'csa_id');
    // }

    // public static function caseStaffAssignment2($csa_id,$requested_by,$approved_by): bool
    // {
    //     return self::where(['csa_id' => $csa_id, 'requested_by' => $requested_by,'approved_by' => $approved_by])->count() > 0;
    // }

    // public function checkIfChanged(): bool
    // {
    //     return self::changed($this->requested_by, $this->case_id,$this->approved_by);
    // }

    // Define relationships
    // public function case()
    // {
    //     return $this->belongsTo(CaseModel::class, 'case_id');
    // }

    // public function assignedBy()
    // {
    //     return $this->belongsTo(User::class, 'assigned_by');
    // }

    // public function change_court_staff()
    // {
    //     return $this->belongsTo(ChangeCourtStaff::class, 'csa_id');
    // }
    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDetail()
    {
        return $this->id;
    }





    // protected $fillable = [
    //     'id',
    //     'csa_id',
    //     'terminated_reason',
    //     'requestd_at',
    //     'requested_by',
    //     'request_accepted',
    //     'request_accepted_at',
    //     'approval_status',
    //     'approved_at',
    //     'approved_by',
    //     'remark',
    //     'created_at',
    //     'updated_at',
    // ];
    // public function caseStaffAssignment()
    // {
    //     return $this->belongsTo(Case_Staff_Assignment::class, 'csa_id');
    // }

    // public function requestedBy()
    // {
    //     return $this->belongsTo(User::class, 'requested_by');
    // }

    // public function approvedBy()
    // {
    //     return $this->belongsTo(User::class, 'approved_by');
    // }
}