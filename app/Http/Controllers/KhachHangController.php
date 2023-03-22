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
        $khachHang = KhachHang::all();
        return response()->json($khachHang);
    }

    public function themMoi(Request $request)
    {
        $khachHang = new KhachHang();
        $khachHang->ten = $request->ten;
        
        $khachHang->save();

        return response()->json([
            'status' => 'success',
            'redirect' => ('khach-hang')
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $khachHang = KhachHang::find($id);
        $khachHang->ten = $request->ten;

        $khachHang->update();

        return response()->json([
            'status' => 'success',
            'redirect' => route('khach-hang')
        ], 200);  
    }

    public function xoa($id)
    {
        $khachHang = KhachHang::find($id);

        if(empty($khachHang)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy đơn vị tính'
            ], 200); 

        }
        
        $khachHang->delete();
        
        return response()->json([
            'status' => 'success',
            'redirect' => route('khach-hang')
        ], 200);    
    }
}
