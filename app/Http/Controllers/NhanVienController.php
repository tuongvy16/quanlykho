<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NhanVienController extends Controller
{
     
    public function nhanVien()
    {
        $phanQuyen = PhanQuyen::all();
        return view('modules.nhanvien.danh-sach',compact('phanQuyen'));
    }

    public function danhSach()
    {
        $nhanVien = NhanVien::with('phan_quyen')->get();

        return response()->json($nhanVien);
    }

    public function themMoi(Request $request)
    {
        $nhanVien = new NhanVien();
        $nhanVien->ten_dang_nhap = $request->ten_dang_nhap;
        $nhanVien->mat_khau = bcrypt($request->mat_khau);
        $nhanVien->ho_ten = $request->ho_ten;
        $nhanVien->ngay_sinh =Carbon::parse($request->ngay_sinh)->format('Y-m-d');
        $nhanVien->dien_thoai = $request->dien_thoai;
        $nhanVien->email = $request->email;
        $nhanVien->phan_quyen_id = $request->phan_quyen_id;
        
        $nhanVien->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm nhân viên thành công!',
            'redirect' => ('nhan-vien')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $nhanVien = NhanVien::find($id);
        $nhanVien->ten_dang_nhap = $request->ten_dang_nhap;
        $nhanVien->ho_ten = $request->ho_ten;
        $nhanVien->ngay_sinh = $request->ngay_sinh;
        $nhanVien->dien_thoai = $request->dien_thoai;
        $nhanVien->email = $request->email;
        $nhanVien->phan_quyen_id = $request->phan_quyen_id;

        $nhanVien->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật nhân viên thành công!',
            'redirect' => route('nhan-vien')
        ], 200);  
    }

    public function xoa($id)
    {
        $nhanVien = NhanVien::find($id);

        if(empty($nhanVien)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy nhân viên'
            ], 200); 

        }
        
        $nhanVien->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá nhân viên thành công!',
            'redirect' => route('nhan-vien')
        ], 200);    
    }
}
