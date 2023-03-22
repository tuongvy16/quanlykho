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
        $donViTinh = DonViTinh::all();
        return response()->json($donViTinh);
    }

    public function themMoi(Request $request)
    {
        $donViTinh = new DonViTinh();
        $donViTinh->ten = $request->ten;
        
        $donViTinh->save();

        return response()->json([
            'status' => 'success',
            'redirect' => ('don-vi-tinh')
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $donViTinh = DonViTinh::find($id);
        $donViTinh->ten = $request->ten;

        $donViTinh->update();

        return response()->json([
            'status' => 'success',
            'redirect' => route('don-vi-tinh')
        ], 200);  
    }

    public function xoa($id)
    {
        $donViTinh = DonViTinh::find($id);

        if(empty($donViTinh)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy đơn vị tính'
            ], 200); 

        }
        
        $donViTinh->delete();
        
        return response()->json([
            'status' => 'success',
            'redirect' => route('don-vi-tinh')
        ], 200);    
    }
}
