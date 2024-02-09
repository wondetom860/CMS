<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $table = "persons";

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

    private function getLogins()
    {
        return User::where(['person_id' => $this->id])->first();
    }

    public function getLoginCreds()
    {
        $logins = $this->getLogins();
        if ($logins) {
            return "{$logins->username}@******";
        } else {
            return "<button class='btn btn-info text-right btn-xs' onclick='signupUser({$this->id})'>Signup</button>";
        }
    }

    public function getFullName()
    {
        return $this->rank . " " . $this->first_name . " " . $this->fath_nam . " " . $this->gfath_name;
    }

    public function getAge()
    {
        return 26;
    }

    // public function person(){
    //     return $this->belongsTo(Person::class);
    // }

    public function court(){
        return $this->belongsTo(Court::class);
    }
}
