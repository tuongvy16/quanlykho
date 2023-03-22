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
        $nhaCungCap = NhaCungCap::all();
        return response()->json($nhaCungCap);
    }
    
    public function themMoi(Request $request)
    {
        $nhaCungCap = new NhaCungCap();
        $nhaCungCap->ten = $request->ten;
        $nhaCungCap->dien_thoai = $request->dien_thoai;
        
        $nhaCungCap->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm nhà cung cấp thành công!',
            'redirect' => ('nha-cung-cap')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $nhaCungCap = NhaCungCap::find($id);
        $nhaCungCap->ten = $request->ten;
        $nhaCungCap->dien_thoai = $request->dien_thoai;

        $nhaCungCap->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật nhà cung cấp thành công!',
            'redirect' => route('nha-cung-cap')
        ], 200);  
    }

    public function xoa($id)
    {
        $nhaCungCap = NhaCungCap::find($id);

        if(empty($nhaCungCap)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy nhà cung cấp'
            ], 200); 

        }
        
        $nhaCungCap->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Xoá nhà cung cấp thành công!',
            'redirect' => route('nha-cung-cap')
        ], 200);    
    }
}
