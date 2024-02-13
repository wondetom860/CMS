<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class ChangeUserNameModel extends Model
{

    public $prevUserName, $newUserName, $newUserNameConfirm, $id;


    // public $table = 'case';
    public static function validate($request)
    {
        return Validator::make($request, [
            'prevUserName' => ['required', 'string', 'max:255'],
            'NewUserName' =>  ['required', 'string', 'max:255'],
            'NewUserNameConfirm' => ['required', 'string', 'max:255'],
            'newUserName' => ['unique:web_user', 'confirmed'],
            // 'newUserName' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function changeUserName()
    {
        $user = User::findOrFail($this->id);
        if ($user->user_name == $this->old) {
            if ($this->new1 == $this->new2) {
                $user->user_name = $this->new1;
                $user->update();
                return [1, "Username changed"];
            } else {
                return [0, "New User Names does'nt match."];
            }
        } else {
            return [0, "Old user name doesn't match"];
        }
    }
}
