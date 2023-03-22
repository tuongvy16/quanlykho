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
        $hinhThuc = HinhThuc::all();
        return response()->json($hinhThuc);
    }

    public function themMoi(Request $request)
    {
        $hinhThuc = new HinhThuc();
        $hinhThuc->ten = $request->ten;
        
        $hinhThuc->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm hình thức thành công!',
            'redirect' => ('hinh-thuc')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $hinhThuc = HinhThuc::find($id);
        $hinhThuc->ten = $request->ten;

        $hinhThuc->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật hình thức thành công!',
            'redirect' => route('hinh-thuc')
        ], 200);  
    }

    public function xoa($id)
    {
        $hinhThuc = HinhThuc::find($id);

        if(empty($hinhThuc)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy hình thức'
            ], 200); 

        }
        
        $hinhThuc->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá hình thức thành công!',
            'redirect' => route('hinh-thuc')
        ], 200);    
    }
}
