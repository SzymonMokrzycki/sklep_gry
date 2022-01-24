<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function his(){
        $getHistory = History::all();
        return view('history', compact('getHistory'));
    }
}
