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
        $chuongtrinh = ChuongTrinh::all();
        return response()->json($chuongtrinh);
    }
    public function themMoi(Request $request)
    {
        $chuongtrinh = new ChuongTrinh();
        $chuongtrinh->ten = $request->ten;
        $chuongtrinh->ngay_bat_dau = Carbon::parse($request->ngay_bat_dau)->format('Y-m-d');    //format thời gian thêm vào csdl
        $chuongtrinh->ngay_ket_thuc = Carbon::parse($request->ngay_ket_thuc)->format('Y-m-d');  //format thời gian thêm vào csdl
        
        $chuongtrinh->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm chương trình thành công!',
            'redirect' => ('chuong-trinh')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $chuongtrinh = ChuongTrinh::find($id);
        $chuongtrinh->ten = $request->ten;
        $chuongtrinh->ngay_bat_dau = Carbon::parse($request->ngay_bat_dau)->format('Y-m-d');    //format thời gian thêm vào csdl
        $chuongtrinh->ngay_ket_thuc = Carbon::parse($request->ngay_ket_thuc)->format('Y-m-d');  //format thời gian thêm vào csdl
        
        $chuongtrinh->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật chương trình thành công!',
            'redirect' => route('chuong-trinh')
        ], 200);  
    }

    public function xoa($id)
    {
        $chuongtrinh = ChuongTrinh::find($id);

        if(empty($chuongtrinh)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy chương trình'
            ], 200); 

        }
        
        $chuongtrinh->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá chương trình thành công!',
            'redirect' => route('chuong-trinh')
        ], 200);    
    }
}
