<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Str;

class SellProductController extends Controller
{
    public function sellP(Request $request){
        $replaced = Str::replace(':',' ',$request->title);
        $replaced1 = Str::replace(' ', '', $replaced);
        $replaced2 = Str::upper($replaced1);
        $data = Product::create();
        $data->title=$request->title;
        $data->title1=$replaced2;
        $data->category=$request->category;
        $data->count=$request->count;
        $data->price=$request->price;
        $data->publisher=$request->publisher;
        $data->platform=$request->platform;
        $data->desc=$request->desc;
        $data->user=Auth::user()->name;
        $data->image="/pictures"."/".$data->id.".jpg";
        $data->save();
        $request->miniature->move(public_path('pictures'), $data->id.'.jpg');
        return redirect('/');
    }
}
