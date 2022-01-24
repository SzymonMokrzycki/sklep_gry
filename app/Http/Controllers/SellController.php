<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function sell(){
        if(Auth::check())
            return view('sell-view');
        else
            return redirect('/');
    }
}
