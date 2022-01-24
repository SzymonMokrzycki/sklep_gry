<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class EditProductController extends Controller
{
    public function edP(Request $request, $id){
        $data = Product::find($id);
        $data->title=$request->title;
        $data->category=$request->category;
        $data->count=$request->count;
        $data->price=$request->price;
        $data->publisher=$request->publisher;
        $data->platform=$request->platform;
        $data->save();
        return redirect('/admin-view/users');
    }
}