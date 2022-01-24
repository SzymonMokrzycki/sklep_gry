<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class EditController extends Controller
{
    public function edT(Request $request, $id){
        $data = User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        if($request->admin == 'on')
            $data->is_admin=true;
        else
            $data->is_admin=false;
        $data->save();
        return redirect('/admin-view/users');
    }
}