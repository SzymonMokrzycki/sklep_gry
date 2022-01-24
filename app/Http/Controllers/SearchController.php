<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request){
        $licznik = 0;
        $getProducts = Product::all();
        $getProducts1 = Product::paginate(12);
        $c = count($getProducts);
        $se = $request->input('szukaj');

        $replaced = Str::replace(':',' ',$se);
        $search = Str::upper(Str::replace(' ', '', $replaced));

        foreach($getProducts as $p){
            if($p->category != $search && $p->title1 != $search && $p->publisher != $search && $p->platform != $search){
                $licznik++;
            }
        }
        return view('search-view')
        ->with(compact('getProducts'))
        ->with(compact('getProducts1'))
        ->with(compact('search'))
        ->with(compact('se'))
        ->with(compact('licznik'))
        ->with(compact('c'));
    }
}
