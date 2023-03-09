<?php

namespace App\Http\Controllers;

use App\Models\Kho;
use Illuminate\Http\Request;

class KhoController extends Controller
{
    public function kho()
    {
        return view('modules.kho.danh-sach');
    }

    public function danhSach()
    {
        $kho = Kho::all();
        return response()->json($kho);
    }

    public function themMoi(Request $request)
    {
        $kho = new Kho();
        $kho->ten = $request->ten;
        
        $kho->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm kho thành công!',
            'redirect' => ('kho')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $kho = Kho::find($id);
        $kho->ten = $request->ten;

        $kho->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật kho thành công!',
            'redirect' => route('kho')
        ], 200);  
    }

    public function xoa($id)
    {
        $kho = Kho::find($id);

        if(empty($kho)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy kho'
            ], 200); 

        }
        
        $kho->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá kho thành công!',
            'redirect' => route('kho')
        ], 200);    
    }
}
