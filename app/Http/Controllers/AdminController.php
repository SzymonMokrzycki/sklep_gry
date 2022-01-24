<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function listUsers()
    {
        //$getUsers = DB::table('users')->get();
        $getUsers = User::all();
        //dd($getUsers->all());
        return view('users-view', compact('getUsers'));
    }
    
    public function productsView(){
        //$getUsers = DB::table('users')->get();
        $getProducts = Product::all();
        //dd($getUsers->all());
        return view('products-view', compact('getProducts'));
    }

    public function categoriesView(){
        //$getUsers = DB::table('users')->get();
        $getCategories = Category::all();
        //dd($getUsers->all());
        return view('categories-view', compact('getCategories'));
    }

    public function deleteUser($name){
        DB::table('users')->where('name',$name)->delete();
        $getUsers = User::all();
        return view('users-view', compact('getUsers')); 
    }

    public function deleteProduct($title){
        DB::table('products')->where('title',$title)->delete();
        $getProducts = Product::all();
        return view('products-view', compact('getProducts')); 
    }

    public function deleteCategory($name){
        DB::table('categories')->where('name',$name)->delete();
        $getCategories = Category::all();
        return view('categories-view', compact('getCategories')); 
    }

    public function editUser($id, $name, $email){
        return view('editusers-view')
        ->with(compact('id'))
        ->with(compact('name'))
        ->with(compact('email'));
    }

    public function editProduct($id, $title, $category, $count, $price, $publisher, $platform){
        return view('editproducts-view')
        ->with(compact('id'))
        ->with(compact('title'))
        ->with(compact('category'))
        ->with(compact('count'))
        ->with(compact('price'))
        ->with(compact('publisher'))
        ->with(compact('platform'));
    }

    public function productsAdd(){
        $getProducts = Product::all();
        return view('addproduct-view', compact('getProducts'));
    }

    public function editCategory($id, $name){
        return view('editcategory-view')
        ->with(compact('id'))
        ->with(compact('name'));
    }

    public function categoriesAdd(){
        $getCategories = Category::all();
        return view('addcategory-view', compact('getCategories'));
    }
}
