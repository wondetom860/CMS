<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordModel extends Model
{

    public $prevPassword, $newPassword, $newPasswordConfirm;


    // public $table = 'case';
    public static function validate($request)
    {
        return Validator::make($request, [
            'prevPassword' => ['required', 'string', 'max:255'],
            'NewPassword' =>  ['required', 'string', 'max:255'],
            'NewPasswordConfirm' => ['required', 'string', 'max:255'],
            'newPassword' => ['unique:web_user', 'confirmed'],
            // 'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function changePassword($id, $old, $new1, $new2)
    {
        $user = User::findOrFail($id);
        if ($user && password_verify($old, $user->password)) {
            if ($new1 == $new2) {
                $user->password = Hash::make($new1);
                $user->update();
                return [1, "Password changed"];
            } else {
                return [0, "New User Names does'nt match."];
            }
        } else {
            return [0, "Old user name doesn't match"];
        }
    }
}
