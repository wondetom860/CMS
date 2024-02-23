<?php

namespace App\Http\Controllers;

use App\Models\ChangePasswordModel;
use App\Models\ChangeUserNameModel;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    //
    public function orders()
    {
        $viewData = [];
        $viewData["title"] = "My Orders - Online Store";
        $viewData["subtitle"] = __("My Orders");
        $viewData["orders"] = Order::where("user_id", auth()->user()->id)->get();
        return view("myaccount.orders")->with("viewData", $viewData);
    }

    public function profile()
    {
        $viewData = [];
        $viewData["title"] = "Profile - CCMS";
        $viewData["subtitle"] = __("Manage Profile");
        // Model = new MyAccount()
        // User::whereId(Auth::user()->id)->get('name', 'id')->first()
        $viewData["profile"] = Auth::user();
        return view("myaccount.profile")->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        // User::Validate($request);
        $user = User::find($id);
        $user->name = $request->name;
        if ($user->save()) {
            notify()->success("Profle Updated Successfully", "Profile Update Success");
            return back();
        } else {
            notify()->error("Profile Update Failed", "Profile Update Failed" . json_encode($user->errors));
            return redirect()->route("myaccout.profile");
        }
    }

    public function updateUserName(Request $request)
    {
        $user = Auth::user();
        if ($user->user_name == $request->old) {
            $chunModel = new ChangeUserNameModel();
            $chunModel->old = $request->old;
            $chunModel->id = $user->id;
            $chunModel->new1 = $request->new1;
            $chunModel->new2 = $request->new2;
            $chunModel->changeUserName();
            notify()->success('User name changed to ' . $chunModel->new1);
        } else {
            notify()->error('Old User Name is not correct');
        }
        return redirect()->route('myaccount.profile');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $user = User::findOrFail($user->id);

        // dd($user->password_hash, Hash::make($request->oldp));

        if ($user && password_verify($request->oldp, $user->password)) {
            $chpwdModel = new ChangePasswordModel();
            $chpwdModel->changePassword($user->id, $request->oldp, $request->newp1, $request->newp2);
            notify()->success('Password changed.');
        } else {
            notify()->error('Old Password is not correct');
        }
        return redirect()->route('myaccount.profile');
    }

    public function changeUserName()
    {
        $chunModel = new ChangeUserNameModel();
        return view('myaccount.change_user_name', compact('chunModel'));
    }

    public function changePassword()
    {
        $chunModel = new ChangePasswordModel();
        return view('myaccount.change_password', compact('chunModel'));
    }

    public function resetPassword($id)
    {
        $user = User::find($id);
        if (Auth::user()->id != $user->id) {
            notify()->error("Reset Password request declined", "You can reset your own password only.");
        } else {
            $dpwd = $user->getDefaultPassword(); //'P@$$W)RD';
            $user->password = Hash::make($dpwd);
            if ($user->save()) {
                notify()->success('Your login password resetted to ' . $dpwd, 'Password reset success');
            } else {
                notify()->error('Password reset failed', 'Password Reset Error' . json_encode($user->errors));
            }
        }

        return redirect()->route('home.index');
    }
}
