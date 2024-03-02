<?php

namespace App\Models;

use Andegna\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastStatment extends Model
{
    use HasFactory;
    public $table = 'last_statement';
    protected $fillable = ['case_id', 'statement_description', 'judges', 'date_time', 'event_id', 'written_by', 'accept_status', 'remark'];

    public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|max:255",
            'statement_description' => "required",
            'judges' => "required|max:255",
            'date_time' => "max:15",
            'event_id' => "max:255",
            'written_by' => "required|max:255",
            'accept_status' => "max:255",
            'remark' => "max:15",
        ]);
    }

    public function getDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime($this->date_time);
            // $gregorian = date_create($this->date_time);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return date_format(date_create($this->date_time),"d/m/Y");
        }
    }

    public function caseStaffAssignemnt()
    {
        return $this->belongsTo(Case_Staff_Assignment::class, 'csa_id');
    }
    public function case()
    {
        return $this->belongsTo(CaseModel::class);
    }

    public function writtenBy()
    {
        return $this->belongsTo(User::class, 'written_by');
    }
    public function getDetail()
    {
        return $this->case->case_number;
    }
    protected function getParty($partyType)
    {
        $ptiff = PartyType::where(['party_type_name' => strtoupper($partyType)])->get()->first();
        return $ptiff ? $ptiff->id : $ptiff;
    }
}

