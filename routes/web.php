<?php

use App\Http\Controllers\DonViTinhController;
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

Route::prefix('don-vi-tinh')->group(function(){

    Route::get('/',[DonViTinhController::class,'donViTinh'])->name('don-vi-tinh');
    Route::get('danh-sach',[DonViTinhController::class,'danhSach'])->name('don-vi-tinh.danh-sach');
    
    Route::post('them-moi',[DonViTinhController::class,'themMoi'])->name('don-vi-tinh.them-moi');
    Route::post('cap-nhat/{id}',[DonViTinhController::class,'capNhat']);
    Route::post('xoa/{id}',[DonViTinhController::class,'xoa']);
});
