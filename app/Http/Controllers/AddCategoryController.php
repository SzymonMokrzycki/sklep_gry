<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AddCategoryController extends Controller
{
    public function addC(Request $request){
        $data = Category::create();
        $data->name=$request->name;
        $data->save();
        return redirect('/admin-view/categories');
    }
}
