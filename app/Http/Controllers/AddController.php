<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddController extends Controller
{
    public function addP(Request $request){
        $data = Product::create();
        $data->title=$request->title;
        $data->category=$request->category;
        $data->count=$request->count;
        $data->price=$request->price;
        $data->publisher=$request->publisher;
        $data->platform=$request->platform;
        $data->save();
        return redirect('/admin-view/products');
    }
}
