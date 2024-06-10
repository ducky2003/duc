<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController ;
use App\Http\Controllers\RegionController ;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\PlaceController ;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\PackCategoryController;
Route::get('/', function () {
    return view('users.home');
});
Route::get('/users/service', function () {
    return view('service');
});
Route::get('/',[RegionController::class, 'getData'])->name('users.home');
Route::get('/',[RegionController::class, 'getCount'])->name('users.home');
Route::get('/region', [RegionController::class, 'showAll'])->name('region');
Route::get('/place', [PlaceController::class,'showAll'])->name('place');
Route::get('/region', [RegionController::class, 'regionDet'])->name('region');
Route::get('/category/{id_category}', [RegionController::class, 'showdetail'])->name('category.detail');
Route::get('/region/{id}', [RegionController::class, 'showPlace'])->name('region.place');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
route::get('/order/{id_pack}', [App\Http\Controllers\PacketController::class, 'preOrder'])->name('order')->middleware('auth');
Route::post('/place-order', [PreOrderController::class, 'placeOrder'])->name('place-order')->middleware('auth');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart')->middleware('auth');
Auth::routes();
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index2'])->name('admin_home');
    Route::resource('/admin/user', UserController::class) -> names('user');
    Route::resource('/admin/region', RegionController::class) -> names('region');
    Route::resource('/admin/place', PlaceController::class) -> names('place');
    Route::resource('/admin/category', PackCategoryController::class) -> names('category');
    route::get('admin/region/{id_region}/delete',[App\Http\Controllers\RegionController::class, 'destroy']);
    route::get('admin/place/{id_place}/delete',[App\Http\Controllers\PlaceController::class, 'destroy']);
    route::get('admin/category/{id_category}/delete',[App\Http\Controllers\PackCategoryController::class, 'destroy']);
    route::get('region-export',[RegionController::class, 'export']);
    route::get('place-export',[PlaceController::class, 'export']);
});

Route::post('/admin/region/destroy', [RegionController::class, 'destroy']);
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
