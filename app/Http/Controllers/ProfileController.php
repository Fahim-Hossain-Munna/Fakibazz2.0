<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('dashboard.profile.index');
    }

    public function name_update(Request $request){
        $old_name = Auth::user()->name;

        $request->validate([
            'name' => 'required',
        ]);

        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);

        return back()->with('name_update',"Name Update success $old_name to $request->name");
    }


    public function email_update(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,',
        ]);

        User::find(auth()->id())->update([
            'email' => $request->email,
            'updated_at' => now(),
        ]);

        return redirect()->route('profile.index')->with('email_update',"Email Update Successful");


    }


    public function password_update(Request $request){
        $request->validate([
            'c_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if(Hash::check($request->c_password, auth()->user()->password)){
            User::find(Auth::user()->id)->update([
                'password' => $request->password,
                'updated_at' => now(),
            ]);
        return redirect()->route('profile.index')->with('password_update',"Password Update Successful");

        }else{
            return back()->withErrors(['c_password' => "Current password doesn't match with our record"])->withInput();
        }
    }


    public function image_update(Request $request){
        $request->validate([
            'image' => 'required|image',
        ]);


        if($request->hasFile('image')){
            $newname = auth()->id() . '-' . rand(1111,9999) . '.' . $request->file('image')->getClientOriginalExtension();
        }

    }

}
