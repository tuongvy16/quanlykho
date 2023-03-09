<?php

namespace App\Http\Controllers;

use App\Models\DonViTinh;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function sanPham()
    {
        $donvitinh = DonViTinh::all();
        return view('modules.sanpham.danh-sach',compact('donvitinh'));
    }

    public function danhSach()
    {   
        $sanpham = SanPham::all();
        return response()->json($sanpham);
    }

    public function themMoi(Request $request)
    {
        $sanpham = new SanPham();
        $sanpham->ten = $request->ten;
        $sanpham->don_vi_tinh_id = $request->don_vi_tinh_id;
        
        $sanpham->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm sản phẩm thành công!',
            'redirect' => ('san-pham')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $sanpham = SanPham::find($id);
        $sanpham->ten = $request->ten;
        $sanpham->don_vi_tinh_id = $request->don_vi_tinh_id;

        $sanpham->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật sản phẩm thành công!',
            'redirect' => route('san-pham')
        ], 200);  
    }

    public function xoa($id)
    {
        $sanpham = SanPham::find($id);

        if(empty($sanpham)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy sản phẩm'
            ], 200); 

        }
        
        $sanpham->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Xoá sản phẩm thành công!',
            'redirect' => route('san-pham')
        ], 200);    
    }
}
