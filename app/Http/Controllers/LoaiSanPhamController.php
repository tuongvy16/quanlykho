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
        $loaisanpham = LoaiSanPham::all();
        return response()->json($loaisanpham);
    }

    public function themMoi(Request $request)
    {
        $loaisanpham = new LoaiSanPham();
        $loaisanpham->ten = $request->ten;
        
        $loaisanpham->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm loại sản phẩm thành công!',
            'redirect' => ('loai-san-pham')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $loaisanpham = LoaiSanPham::find($id);
        $loaisanpham->ten = $request->ten;

        $loaisanpham->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật loại sản phẩm thành công!',
            'redirect' => route('loai-san-pham')
        ], 200);  
    }

    public function xoa($id)
    {
        $loaisanpham = LoaiSanPham::find($id);

        if(empty($loaisanpham)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy loại sản phẩm'
            ], 200); 

        }
        
        $loaisanpham->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá loại sản phẩm thành công!',
            'redirect' => route('loai-san-pham')
        ], 200);    
    }
}