<?php

namespace App\Http\Controllers;

use App\Models\DonViTinh;
use Illuminate\Http\Request;

class DonViTinhController extends Controller
{
    public function donViTinh()
    {
        return view('modules.donvitinh.danh-sach');
    }

    public function danhSach()
    {
        $donvitinh = DonViTinh::all();
        return response()->json($donvitinh);
    }
    public function themMoi(Request $request)
    {
        $donvitinh = new DonViTinh();
        $donvitinh->ten = $request->ten;
        
        $donvitinh->save();

        return response()->json([
            'status' => 'success',
            'redirect' => ('don-vi-tinh')
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $donvitinh = DonViTinh::find($id);
        $donvitinh->ten = $request->ten;
        $donvitinh->update();
        return response()->json([
            'status' => 'success',
            'redirect' => route('don-vi-tinh')
        ], 200);  
    }

    public function xoa($id)
    {
        $donvitinh = DonViTinh::find($id);
        if(empty($donvitinh)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy đơn vị tính'
            ], 200); 

        }
        
        $donvitinh->delete();
        return response()->json([
            'status' => 'success',
            'redirect' => route('don-vi-tinh')
        ], 200);    
    }
}
