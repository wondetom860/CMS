<?php

namespace App\Models;

use Andegna\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    

    protected $fillable = ['case_id', 'event_type_id','date_time','location','out_come'];

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

    public function getDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime($this->created_at);
            // $gregorian = date_create($this->created_at);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return $this->created_at;
        }
    }

    public function validDate(){
        $now = time();
        $schedDatetime = strtotime($this->date_time);
        return ($schedDatetime > $now) && ($schedDatetime < $now + (86400 * 14));
    }

    public function case(){
        return $this->belongsTo(CaseModel::class);
    }

    public function eventType(){
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

    public function createdBy(){
        return $this->belongsTo(User::class,'id');
    }
}
