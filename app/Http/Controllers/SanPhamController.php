<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\DonViTinh;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function sanPham()
    {
        $donViTinh = DonViTinh::all();
        $loaiSanPham = LoaiSanPham::all();
        return view('modules.sanpham.danh-sach',compact('donViTinh','loaiSanPham'));
    }

    public function danhSach()
    {   
        $sanPham = SanPham::with('don_vi_tinh')->get();
        return response()->json($sanPham);
    }

    public function themMoi(Request $request)
    {
        $sanPham = new SanPham();
        $sanPham->ten = $request->ten;
        $sanPham->don_vi_tinh_id = $request->don_vi_tinh_id;

        $sanPham->save();
        
        foreach($request->loai_san_pham_id_ as $loaiSanPham)
        {
            $chiTietSanPham = new ChiTietSanPham();
            $chiTietSanPham->san_pham_id = $sanPham->id;
            $chiTietSanPham->loai_san_pham_id = $loaiSanPham;
            $chiTietSanPham->save();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Thêm sản phẩm thành công!',
            'redirect' => ('san-pham')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $sanPham = SanPham::find($id);
        $sanPham->ten = $request->ten;
        $sanPham->don_vi_tinh_id = $request->don_vi_tinh_id;

        $sanPham->update();

        $chiTietSanPham = ChiTietSanPham::where('san_pham_id',$request->id)->delete();
        
        foreach($request->loai_san_pham_id_ as $loaiSanPham)
        {
            $chiTietSanPham = new ChiTietSanPham();
            $chiTietSanPham->san_pham_id = $sanPham->id;
            $chiTietSanPham->loai_san_pham_id = $loaiSanPham;
            $chiTietSanPham->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật sản phẩm thành công!',
            'redirect' => route('san-pham')
        ], 200);  
    }

    public function xoa($id)
    {
        $sanPham = SanPham::find($id);

        if(empty($sanPham)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy sản phẩm'
            ], 200); 
        }
        
        $sanPham->delete();
        $chiTietSanPham = ChiTietSanPham::where('san_pham_id',$id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Xoá sản phẩm thành công!',
            'redirect' => route('san-pham')
        ], 200);    
    }
}
