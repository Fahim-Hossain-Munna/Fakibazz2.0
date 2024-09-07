<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
