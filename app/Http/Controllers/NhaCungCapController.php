<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    public function nhaCungCap()
    {
        return view('modules.nhacungcap.danh-sach');
    }

    public function danhSach()
    {
        $nhacungcap = NhaCungCap::all();
        return response()->json($nhacungcap);
    }
    public function themMoi(Request $request)
    {
        $nhacungcap = new NhaCungCap();
        $nhacungcap->ten = $request->ten;
        $nhacungcap->dien_thoai = $request->dien_thoai;
        
        $nhacungcap->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm nhà cung cấp thành công!',
            'redirect' => ('nha-cung-cap')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $nhacungcap = NhaCungCap::find($id);
        $nhacungcap->ten = $request->ten;
        $nhacungcap->dien_thoai = $request->dien_thoai;
        $nhacungcap->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật nhà cung cấp thành công!',
            'redirect' => route('nha-cung-cap')
        ], 200);  
    }

    public function xoa($id)
    {
        $nhacungcap = NhaCungCap::find($id);
        if(empty($nhacungcap)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy nhà cung cấp'
            ], 200); 

        }
        
        $nhacungcap->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá nhà cung cấp thành công!',
            'redirect' => route('nha-cung-cap')
        ], 200);    
    }
}
