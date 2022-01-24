<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class EditCategoryController extends Controller
{
    public function edC(Request $request, $id){
        $data = Category::find($id);
        $data->name=$request->name;
        $data->save();
        return redirect('/admin-view/categories');
    }
}
