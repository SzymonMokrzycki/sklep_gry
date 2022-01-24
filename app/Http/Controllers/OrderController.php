<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class OrderController extends Controller
{
    public function sendOrder(Request $request){
        $data = History::create();
        $p = "";
        for($i = 0; $i<count($request->products); $i++){
            $p .= $request->products[$i]." x".$request->ii[$i].", ";
        }
        $data->products=$p;
        $data->sum=round((float)$request->total, 2);
        $data->save();
        return redirect('/history/shopping');
    }
}
