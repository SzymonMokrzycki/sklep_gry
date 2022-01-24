<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class SettingsController extends Controller
{
    public function sett(){
        return view('settings_account');
    }

    public function set(Request $request, $id){
        $data = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->save();
        Auth::logout();
        return redirect('/');
    }

    public function passChange(Request $request, $id){
        $data = User::find($id);
        if(Hash::check($request->oldpass, $data->password)){
            $request->validate([
                'newpass' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8'
            ]);
            $data->password=Hash::make($request->newpass);
            $data->save();
            Auth::logout();
            return redirect('/');
        }else{
            $title = "Invalid old password.";
            return view('settings_account', compact('title'));
        }
    }
}
