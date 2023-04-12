<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function changePassword()
    {
        return view('frontend.change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        //The new password can't be the same with the old password
        if(strcmp($request->old_password, $request->new_password) == 0){
            return back()->with("error", "New Password can't be the same with Old Password. Please choose a different password!");
         }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('home')->with('alert', 'Your password is successfully updated!');
    }
}
