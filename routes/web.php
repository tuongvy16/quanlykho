<?php

use App\Http\Controllers\LoaiSanPhamController;
use Illuminate\Support\Facades\Route;

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
     return view('master');
});

Route::prefix('loai-san-pham')->group(function(){

    Route::get('/',[LoaiSanPhamController::class,'loaiSanPham'])->name('loai-san-pham');
    Route::get('danh-sach',[LoaiSanPhamController::class,'danhSach'])->name('loai-san-pham.danh-sach');
    
    Route::post('them-moi',[LoaiSanPhamController::class,'themMoi'])->name('loai-san-pham.them-moi');
    Route::post('cap-nhat/{id}',[LoaiSanPhamController::class,'capNhat']);
    Route::post('xoa/{id}',[LoaiSanPhamController::class,'xoa']);
});
