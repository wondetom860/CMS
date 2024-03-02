<?php

namespace App\Models;

use Andegna\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['case_id', 'person_id', 'party_type_id'];
    public $table = 'party';
    public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|max:255",
            'person_id' => "required|max:255",
            'party_type_id' => "required|max:255",
        ]);
    }

    public function getPartyDetail()
    {
        return $this->person->getFullName();
    }
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function partyType()
    {
        return $this->belongsTo(PartyType::class);
    }
    public function case()
    {
        return $this->belongsTo(CaseModel::class);
    }
    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime(date_create($this->date_time));
            // $gregorian = date_create($this->created_at);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return date_format(date_create($this->date_time), "d/m/Y");
        }
    }

    public function getDetail()
    {
        return $this->case->case_number;
    }
    public function documents()
    {
        return $this->hasMany(Document::class,'case_id');
    }
    public function events()
    {
        return $this->hasMany(event::class,'case_id');
    }

    public function staffs()
    {
        return $this->hasMany(Case_Staff_Assignment::class,'case_id');
    }
   
    public function eventType()
    {
        return $this->hasMany(EventType::class);
    }

}


    
   


