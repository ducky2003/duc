<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController ;
use App\Http\Controllers\RegionController ;
use App\Http\Controllers\PlaceController ;
use App\Http\Controllers\PacketController;
Route::get('/', function () {
    return view('users.home');
});
Route::get('/users/service', function () {
    return view('service');
});
Route::get('/',[RegionController::class, 'getData'])->name('users.home');
Route::get('/',[RegionController::class, 'getCount'])->name('users.home');
// Route::get('/region/{id_region}', [RegionController::class,'show'])->name('region.show');
// Route::get('/',[PacketController::class, 'getplacename'])->name('users.home');
Route::get('/region', [RegionController::class, 'showAll'])->name('region');
Route::get('/place', [PlaceController::class,'showAll'])->name('place');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index2'])->name('admin_home');
    Route::resource('/admin/user', UserController::class) -> names('user');
    Route::resource('/admin/region', RegionController::class) -> names('region');
    Route::resource('/admin/place', PlaceController::class) -> names('place');
    route::get('admin/region/{id_region}/delete',[App\Http\Controllers\RegionController::class, 'destroy']);
    route::get('admin/place/{id_place}/delete',[App\Http\Controllers\PlaceController::class, 'destroy']);
    route::get('/region/export',[App\Http\Controllers\RegionController::class, 'export']);
});

Route::post('/admin/region/destroy', [RegionController::class, 'destroy']);
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
