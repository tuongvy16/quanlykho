<?php

namespace App\Http\Controllers;

use App\Models\Kho;
use App\Models\SanPham;
use App\Models\HinhThuc;
use App\Models\KhachHang;
use App\Models\ChuongTrinh;
use App\Models\LoaiSanPham;
use App\Models\XuatKho;
use Illuminate\Http\Request;

class XuatKhoController extends Controller
{
    public function xuatKho()
    {
        $kho = Kho::all();
        $hinhThuc = HinhThuc::all();
        $chuongTrinh = ChuongTrinh::all();
        $khachHang = KhachHang::all();
        $sanPham = SanPham::all();
        $loaiSanPham = LoaiSanPham::all();
        return view('modules.xuatkho.danh-sach',compact('kho','hinhThuc','chuongTrinh','khachHang','sanPham','loaiSanPham'));
    }

    public function danhSach()
    {
        $xuatKho = XuatKho::with('kho')->get();
        $xuatKho = XuatKho::with('hinh_thuc')->get();
        $xuatKho = XuatKho::with('chuong_trinh')->get();
        $xuatKho = XuatKho::with('khach_hang')->get();
        $xuatKho = XuatKho::with('san_pham')->get();
        $xuatKho = XuatKho::with('loai_san_pham')->get();
        return response()->json($xuatKho);
    }

    public function themMoi(Request $request)
    {
        $xuatKho = new XuatKho();
        $xuatKho->kho_id = $request->kho_id;
        $xuatKho->hinh_thuc_id = $request->hinh_thuc_id;
        $xuatKho->chuong_trinh_id = $request->chuong_trinh_id;
        $xuatKho->khach_hang_id = $request->khach_hang_id;
        $xuatKho->nhan_vien_xuat_id = $request->nhan_vien_xuat_id;
        $xuatKho->ghi_chu = $request->ghi_chu;
        $xuatKho->ngay_duyet = $request->ngay_duyet;
        $xuatKho->trang_thai = $request->trang_thai;

        
        $xuatKho->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm phiếu xuất kho thành công!',
            'redirect' => ('xuat-kho')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $xuatKho = XuatKho::find($id);
        $xuatKho->kho_id = $request->kho_id;
        $xuatKho->hinh_thuc_id = $request->hinh_thuc_id;
        $xuatKho->chuong_trinh_id = $request->chuong_trinh_id;
        $xuatKho->khach_hang_id = $request->khach_hang_id;
        $xuatKho->nhan_vien_xuat_id = $request->nhan_vien_xuat_id;
        $xuatKho->ghi_chu = $request->ghi_chu;
        $xuatKho->ngay_duyet = $request->ngay_duyet;
        $xuatKho->trang_thai = $request->trang_thai;

        $xuatKho->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật phiếu xuất kho thành công!',
            'redirect' => route('xuat-kho')
        ], 200);  
    }

    public function xoa($id)
    {
        $xuatKho = XuatKho::find($id);

        if(empty($xuatKho)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy phiếu xuất kho'
            ], 200); 

        }
        
        $xuatKho->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá phiếu xuất kho thành công!',
            'redirect' => route('xuat-kho')
        ], 200);    
    }
}
