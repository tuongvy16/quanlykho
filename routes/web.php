<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NhapKhoController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\HinhThucController;
use App\Http\Controllers\DonViTinhController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\ChuongTrinhController;
use App\Http\Controllers\LoaiSanPhamController;

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

Route::get('get-url', [MenuController::class, 'getURL'])->name('get-url');

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

Route::prefix('hinh-thuc')->group(function(){

    Route::get('/',[HinhThucController::class,'hinhThuc'])->name('hinh-thuc');
    Route::get('danh-sach',[HinhThucController::class,'danhSach'])->name('hinh-thuc.danh-sach');
    
    Route::post('them-moi',[HinhThucController::class,'themMoi'])->name('hinh-thuc.them-moi');
    Route::post('cap-nhat/{id}',[HinhThucController::class,'capNhat']);
    Route::post('xoa/{id}',[HinhThucController::class,'xoa']);
});

Route::prefix('kho')->group(function(){

    Route::get('/',[KhoController::class,'kho'])->name('kho');
    Route::get('danh-sach',[KhoController::class,'danhSach'])->name('kho.danh-sach');
    
    Route::post('them-moi',[KhoController::class,'themMoi'])->name('kho.them-moi');
    Route::post('cap-nhat/{id}',[KhoController::class,'capNhat']);
    Route::post('xoa/{id}',[KhoController::class,'xoa']);
});

Route::prefix('nha-cung-cap')->group(function(){

    Route::get('/',[NhaCungCapController::class,'nhaCungCap'])->name('nha-cung-cap');
    Route::get('danh-sach',[NhaCungCapController::class,'danhSach'])->name('nha-cung-cap.danh-sach');
    Route::post('them-moi',[NhaCungCapController::class,'themMoi'])->name('nha-cung-cap.them-moi');
    Route::post('cap-nhat/{id}',[NhaCungCapController::class,'capNhat']);
    Route::post('xoa/{id}',[NhaCungCapController::class,'xoa']);
});

Route::prefix('chuong-trinh')->group(function(){

    Route::get('/',[ChuongTrinhController::class,'chuongTrinh'])->name('chuong-trinh');
    Route::get('danh-sach',[ChuongTrinhController::class,'danhSach'])->name('chuong-trinh.danh-sach');
    Route::post('them-moi',[ChuongTrinhController::class,'themMoi'])->name('chuong-trinh.them-moi');
    Route::post('cap-nhat/{id}',[ChuongTrinhController::class,'capNhat']);
    Route::post('xoa/{id}',[ChuongTrinhController::class,'xoa']);
});

Route::prefix('san-pham')->group(function(){

    Route::get('/',[SanPhamController::class,'sanPham'])->name('san-pham');
    Route::get('danh-sach',[SanPhamController::class,'danhSach'])->name('san-pham.danh-sach');
    Route::post('them-moi',[SanPhamController::class,'themMoi'])->name('san-pham.them-moi');
    Route::post('cap-nhat/{id}',[SanPhamController::class,'capNhat']);
    Route::post('xoa/{id}',[SanPhamController::class,'xoa']);
});

Route::prefix('khach-hang')->group(function(){

    Route::get('/',[KhachHangController::class,'khachHang'])->name('khach-hang');
    Route::get('danh-sach',[KhachHangController::class,'danhSach'])->name('khach-hang.danh-sach');
    Route::post('them-moi',[KhachHangController::class,'themMoi'])->name('khach-hang.them-moi');
    Route::post('cap-nhat/{id}',[KhachHangController::class,'capNhat']);
    Route::post('xoa/{id}',[KhachHangController::class,'xoa']);
});

Route::prefix('nhap-kho')->group(function(){

    Route::get('/',[NhapKhoController::class,'nhapKho'])->name('nhap-kho');
    Route::get('danh-sach',[NhapKhoController::class,'danhSach'])->name('nhap-kho.danh-sach');
    Route::post('them-moi',[NhapKhoController::class,'themMoi'])->name('nhap-kho.them-moi');
    Route::post('cap-nhat/{id}',[NhapKhoController::class,'capNhat']);
    Route::post('xoa/{id}',[NhapKhoController::class,'xoa']);
});

