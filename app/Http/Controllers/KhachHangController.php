<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function khachHang()
    {
        return view('modules.khachhang.danh-sach');
    }

    public function danhSach()
    {
        $khachhang = KhachHang::all();
        return response()->json($khachhang);
    }

    public function themMoi(Request $request)
    {
        $khachhang = new KhachHang();
        $khachhang->ten = $request->ten;
        
        $khachhang->save();

        return response()->json([
            'status' => 'success',
            'redirect' => ('khach-hang')
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $khachhang = KhachHang::find($id);
        $khachhang->ten = $request->ten;

        $khachhang->update();

        return response()->json([
            'status' => 'success',
            'redirect' => route('khach-hang')
        ], 200);  
    }

    public function xoa($id)
    {
        $khachhang = KhachHang::find($id);

        if(empty($khachhang)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy đơn vị tính'
            ], 200); 

        }
        
        $khachhang->delete();
        
        return response()->json([
            'status' => 'success',
            'redirect' => route('khach-hang')
        ], 200);    
    }
}
