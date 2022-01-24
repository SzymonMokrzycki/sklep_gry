<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getProducts = Product::paginate(12);
        $getProducts1 = Product::all();
        $getCategories = Category::all();
        $length = count($getProducts1);
        $date = Carbon::now()->format('d');
        $date1 = Carbon::now()->format('m');
        return view('home')
        ->with(compact('getProducts'))
        ->with(compact('getProducts1'))
        ->with(compact('getCategories'))
        ->with(compact('length'))
        ->with(compact('date'))
        ->with(compact('date1'));
    }

    public function listUsers()
    {
    //$getUsers = DB::table('users')->get();
    $getUsers = User::all();
    //dd($getUsers->all());
    return view('users', compact('getUsers'));
    }
    
    public function adminView()
    {
        return view('admin-view');
    }
}
