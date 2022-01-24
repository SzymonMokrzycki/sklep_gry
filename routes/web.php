<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $getProducts = Product::paginate(12);
    $getProducts1 = Product::all();
    $getCategories = Category::all();
    $length = count($getProducts1);
    $date = Carbon::now()->format('d');
    $date1 = Carbon::now()->format('m');
    return view('welcome')
    ->with(compact('getProducts'))
    ->with(compact('getProducts1'))
    ->with(compact('getCategories'))
    ->with(compact('length'))
    ->with(compact('date'))
    ->with(compact('date1'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.view');

Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'sett'])->name('settings.view');

Route::get('/remove-cart/{id}', [App\Http\Controllers\CartController::class, 'removeProduct'])->name('remove-cart.view');

Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addtocartcart.view');

Route::get('/add-to-cart/{id}/{count}', [App\Http\Controllers\CartController::class, 'addToCart1'])->name('addtocartcart1.view');

Route::get('/{category}', function($cat){
    $getProducts = Product::paginate(12);
    $getProducts1 = Product::all();
    $getCategories = Category::all();
    $length = count($getProducts1);
    $date = Carbon::now()->format('d');
    $date1 = Carbon::now()->format('m');
    $catt = $cat;
    return view('cat-wel')
    ->with(compact('getProducts'))
    ->with(compact('getProducts1'))
    ->with(compact('getCategories'))
    ->with(compact('length'))
    ->with(compact('date'))
    ->with(compact('date1'))
    ->with(compact('catt'));
})->name('catt.wel');

//Route::get('/users', [App\Http\Controllers\HomeController::class, 'listUsers'])->name('users');

Route::get('/admin-view/users', [App\Http\Controllers\AdminController::class, 'listUsers'])->name('users.view');

Route::get('/sell/sell-game', [App\Http\Controllers\SellController::class, 'sell'])->name('sell.view');

Route::get('/search/sea', [App\Http\Controllers\SearchController::class, 'search'])->name('search.view');

Route::get('/history/shopping', [App\Http\Controllers\HistoryController::class, 'his'])->name('his.view');

Route::post('update/{id}', 'EditController@edT');

Route::post('updateP/{id}', 'EditProductController@edP');

Route::post('updateC/{id}', 'EditCategoryController@edC');

Route::post('addP', 'AddController@addP');

Route::post('addC', 'AddCategoryController@addC');

Route::post('selP', 'SellProductController@sellP');

Route::post('settt/{id}', 'SettingsController@set');

Route::post('password/{id}', 'SettingsController@passChange');

Route::post('order', 'OrderController@sendOrder');

Route::get('/admin-view/users/{name}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('users-delete.view');

Route::get('/admin-view/products/{title}', [App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('products-delete.view');

Route::get('/admin-view/categories/{name}', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('categories-delete.view');

Route::get('/admin-view/products', [App\Http\Controllers\AdminController::class, 'productsView'])->name('products.view');

Route::get('/admin-view/categories', [App\Http\Controllers\AdminController::class, 'categoriesView'])->name('categories.view');

Route::get('/admin-view/editU/{id}/{name}/{email}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('edit.user');

Route::get('/admin-view/editC/{id}/{name}', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('edit.category');

Route::get('/admin-view/editP/{id}/{title}/{category}/{count}/{price}/{publisher}/{platform}', [App\Http\Controllers\AdminController::class, 'editProduct'])->name('edit.product');

Route::get('/admin-view/add/product', [App\Http\Controllers\AdminController::class, 'productsAdd'])->name('products.add');

Route::get('/admin-view/add/category', [App\Http\Controllers\AdminController::class, 'categoriesAdd'])->name('categories.add');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/admin-view', 'HomeController@adminView')->name('admin.view');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clear/cart', [App\Http\Controllers\CartController::class, 'clear'])->name('clear.cart');