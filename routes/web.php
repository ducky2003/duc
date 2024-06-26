<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController ;
use App\Http\Controllers\RegionController ;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\PlaceController ;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\PackCategoryController;
use App\Models\Supplier;

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
route::get('/order/{id_pack}', [App\Http\Controllers\PacketController::class, 'preOrder'])->name('order')->middleware('auth');
Route::post('/place-order', [PreOrderController::class, 'placeOrder'])->name('place-order')->middleware('auth');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart')->middleware('auth');
Route::get('/detail_booking/{id_pack}', [PacketController::class,'show'])->name('detail_booking');
route::get('/post', [PostController::class, 'getData'])->name('post');
Route::get('/detail_post/{id_post}', [PostController::class,'detail'])->name('detail_post');
Route::post('/rate', [RateController::class, 'store'])->name('rate.store')->middleware('auth');
Route::post('/comment', [PostController::class, 'storeComment'])->name('post.comment');
Route::delete('/comment/{id_comment}', [CommentController::class, 'delete'])->name('comment.delete');
Route::delete('/cart/{id_order}/cancel', [PreOrderController::class, 'cancel'])->name('cart.cancel');

Route::put('/comment/{id_comment}', [CommentController::class, 'update'])->name('comment.update');
Auth::routes();
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index2'])->name('admin_home');
    Route::resource('/admin/user', UserController::class) -> names('user');
    Route::resource('/admin/region', RegionController::class) -> names('region');
    Route::resource('/admin/place', PlaceController::class) -> names('place');
    Route::resource('/admin/post', PostController::class) -> names('post');
    Route::resource('/admin/category', PackCategoryController::class) -> names('category');
    Route::resource('/admin/supplier', SupplierController::class) -> names('supplier');
    Route::resource('/admin/order', PreOrderController::class) -> names('order');
    Route::resource('/admin/menu', MenuController::class) -> names('menu');
    Route::resource('/admin/pack', PacketController::class) -> names('pack');
    Route::post('pack/upload', [PacketController::class, 'upload'])->name('pack.upload');
    Route::post('post/upload', [PostController::class, 'upload'])->name('post.upload');
    route::get('admin/region/{id_region}/delete',[App\Http\Controllers\RegionController::class, 'destroy']);
    route::get('admin/place/{id_place}/delete',[App\Http\Controllers\PlaceController::class, 'destroy']);
    route::get('admin/category/{id_category}/delete',[App\Http\Controllers\PackCategoryController::class, 'destroy']);
    route::get('admin/post/{id_post}/delete',[App\Http\Controllers\PostController::class, 'destroy']);
    route::get('admin/supplier/{id_supp}/delete',[App\Http\Controllers\SupplierController::class, 'destroy']);
    route::get('admin/menu/{id_menu}/delete',[App\Http\Controllers\MenuController::class, 'destroy']);
    route::get('admin/pack/{id_pack}/delete',[App\Http\Controllers\PacketController::class, 'destroy']);
    route::get('region-export',[RegionController::class, 'export']);
    route::get('place-export',[PlaceController::class, 'export']);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
