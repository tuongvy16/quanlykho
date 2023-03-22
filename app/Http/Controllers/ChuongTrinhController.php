<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ChuongTrinh;
use Illuminate\Http\Request;

class ChuongTrinhController extends Controller
{
    public function chuongTrinh()
    {
        return view('modules.chuongtrinh.danh-sach');
    }

    public function danhSach()
    {
        $chuongTrinh = ChuongTrinh::all();
        return response()->json($chuongTrinh);
    }
    public function themMoi(Request $request)
    {
        $chuongTrinh = new ChuongTrinh();
        $chuongTrinh->ten = $request->ten;
        $chuongTrinh->ngay_bat_dau = Carbon::parse($request->ngay_bat_dau)->format('Y-m-d');    //format thời gian thêm vào csdl
        $chuongTrinh->ngay_ket_thuc = Carbon::parse($request->ngay_ket_thuc)->format('Y-m-d');  //format thời gian thêm vào csdl
        
        $chuongTrinh->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm chương trình thành công!',
            'redirect' => ('chuong-trinh')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $chuongTrinh = ChuongTrinh::find($id);
        $chuongTrinh->ten = $request->ten;
        $chuongTrinh->ngay_bat_dau = Carbon::parse($request->ngay_bat_dau)->format('Y-m-d');    //format thời gian thêm vào csdl
        $chuongTrinh->ngay_ket_thuc = Carbon::parse($request->ngay_ket_thuc)->format('Y-m-d');  //format thời gian thêm vào csdl
        
        $chuongTrinh->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật chương trình thành công!',
            'redirect' => route('chuong-trinh')
        ], 200);  
    }

    public function xoa($id)
    {
        $chuongTrinh = ChuongTrinh::find($id);

        if(empty($chuongTrinh)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy chương trình'
            ], 200); 

        }
        
        $chuongTrinh->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá chương trình thành công!',
            'redirect' => route('chuong-trinh')
        ], 200);    
    }
}
