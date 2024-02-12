<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $table = "persons";
    public $key = 'id';

    protected $stopOnFirstFailure = true;

    public static function validate($request)
    {
        $request->validate([
            'first_name' => "required|max:255",
            'fat_name',
            'gfath_name' => "required|max:255",
            // 'gfath_name' => "required|max:255",
            'dob' => 'required|date',
            'gender' => 'required|max:6',
            'id_number' => "required|max:8"
        ]);
    }

    public function getDate()
    {
        return date("Y-m-d", $this->dob);
    }

    private function getLogins()
    {
        return User::where(['person_id' => $this->id])->first();
    }

    public function getLoginCreds($withLink = null)
    {
        $logins = $this->getLogins();
        if ($logins) {
            return "{$logins->user_name}@******";
        } else {
            return $withLink ? "<button class='btn btn-info text-right btn-sm' onclick='signupUser({$this->id})'>Create Login Account</button>"
                : "<p class='bg-warning'>Login account doesn't exist.</p>";
        }
    }

    public function getFullName()
    {
        return $this->rank . " " . $this->first_name . " " . $this->fath_name . " " . $this->gfath_name;
    }

    public function getAge()
    {
        return 26;
    }

    public function getRandomUserName()
    {
        return strtoupper($this->first_name[0] . $this->fath_name[0] . $this->gfath_name[0] . rand(999, 10000));
    }

    public function getDefaultPassword()
    {
        return "younT@123";
    }

    // public function person(){
    //     return $this->belongsTo(Person::class);
    // }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
