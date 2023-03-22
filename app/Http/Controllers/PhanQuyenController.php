<?php

namespace App\Http\Controllers;

use App\Models\PhanQuyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function phanQuyen()
    {
        return view('modules.phanquyen.danh-sach');
    }

    public function danhSach()
    {
        $phanQuyen = PhanQuyen::all();
        return response()->json($phanQuyen);
    }

    public function themMoi(Request $request)
    {
        $phanQuyen = new PhanQuyen();
        $phanQuyen->ten = $request->ten;
        
        $phanQuyen->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm phân quyền thành công!',
            'redirect' => ('phan-quyen')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $phanQuyen = PhanQuyen::find($id);
        $phanQuyen->ten = $request->ten;

        $phanQuyen->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật phân quyền thành công!',
            'redirect' => route('phan-quyen')
        ], 200);  
    }

    public function xoa($id)
    {
        $phanQuyen = PhanQuyen::find($id);

        if(empty($phanQuyen)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy phân quyền'
            ], 200); 

        }
        
        $phanQuyen->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá phân quyền thành công!',
            'redirect' => route('phan-quyen')
        ], 200);    
    }
}
