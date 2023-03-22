<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    
    public function loaiSanPham()
    {
        return view('modules.loaisanpham.danh-sach');
    }

    public function danhSach()
    {
        $loaiSanPham = LoaiSanPham::all();
        return response()->json($loaiSanPham);
    }

    public function themMoi(Request $request)
    {
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->ten = $request->ten;
        
        $loaiSanPham->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm loại sản phẩm thành công!',
            'redirect' => ('loai-san-pham')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        $loaiSanPham->ten = $request->ten;

        $loaiSanPham->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật loại sản phẩm thành công!',
            'redirect' => route('loai-san-pham')
        ], 200);  
    }

    public function xoa($id)
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if(empty($loaiSanPham)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy loại sản phẩm'
            ], 200); 

        }
        
        $loaiSanPham->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá loại sản phẩm thành công!',
            'redirect' => route('loai-san-pham')
        ], 200);    
    }
}