<?php

namespace App\Http\Controllers;

use App\Models\HinhThuc;
use Illuminate\Http\Request;

class HinhThucController extends Controller
{
    public function hinhThuc()
    {
        return view('modules.hinhthuc.danh-sach');
    }

    public function danhSach()
    {
        $hinhthuc = HinhThuc::all();
        return response()->json($hinhthuc);
    }
    public function themMoi(Request $request)
    {
        $hinhthuc = new HinhThuc();
        $hinhthuc->ten = $request->ten;
        
        $hinhthuc->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm hình thức thành công!',
            'redirect' => ('hinh-thuc')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $hinhthuc = HinhThuc::find($id);
        $hinhthuc->ten = $request->ten;
        $hinhthuc->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật hình thức thành công!',
            'redirect' => route('hinh-thuc')
        ], 200);  
    }

    public function xoa($id)
    {
        $hinhthuc = HinhThuc::find($id);
        if(empty($hinhthuc)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy hình thức'
            ], 200); 

        }
        
        $hinhthuc->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá hình thức thành công!',
            'redirect' => route('hinh-thuc')
        ], 200);    
    }
}
