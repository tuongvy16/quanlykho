<?php

namespace App\Http\Controllers;

use App\Models\ChuongTrinh;
use App\Models\HinhThuc;
use App\Models\KhachHang;
use App\Models\Kho;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;
use App\Models\NhapKho;
use App\Models\SanPham;
use Illuminate\Http\Request;

class NhapKhoController extends Controller
{
    public function nhapKho()
    {
        $kho = Kho::all();
        $nhacungcap = NhaCungCap::all();
        $hinhthuc = HinhThuc::all();
        $chuongtrinh = ChuongTrinh::all();
        $khachhang = KhachHang::all();
        $sanpham = SanPham::all();
        $loaisanpham = LoaiSanPham::all();
        return view('modules.nhapkho.danh-sach',compact('kho','nhacungcap','hinhthuc','chuongtrinh','khachhang','sanpham','loaisanpham'));
    }

    public function danhSach()
    {
        $nhapkho = NhapKho::all();
        return response()->json($nhapkho);
    }

    public function themMoi(Request $request)
    {
        $nhapkho = new NhapKho();
        $nhapkho->kho_id = $request->kho_id;
        $nhapkho->nha_cung_cap_id = $request->nha_cung_cap_id;
        $nhapkho->hinh_thuc_id = $request->hinh_thuc_id;
        $nhapkho->chuong_trinh_id = $request->chuong_trinh_id;
        $nhapkho->khach_hang_id = $request->khach_hang_id;
        $nhapkho->nhan_vien_nhap_id = $request->nhan_vien_nhap_id;
        $nhapkho->ghi_chu = $request->ghi_chu;
        $nhapkho->ngay_duyet = $request->ngay_duyet;
        $nhapkho->trang_thai = $request->trang_thai;

        
        $nhapkho->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm phiếu nhập kho thành công!',
            'redirect' => ('nhap-kho')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $nhapkho = NhapKho::find($id);
        $nhapkho->kho_id = $request->kho_id;
        $nhapkho->nha_cung_cap_id = $request->nha_cung_cap_id;
        $nhapkho->hinh_thuc_id = $request->hinh_thuc_id;
        $nhapkho->chuong_trinh_id = $request->chuong_trinh_id;
        $nhapkho->khach_hang_id = $request->khach_hang_id;
        $nhapkho->nhan_vien_nhap_id = $request->nhan_vien_nhap_id;
        $nhapkho->ghi_chu = $request->ghi_chu;
        $nhapkho->ngay_duyet = $request->ngay_duyet;
        $nhapkho->trang_thai = $request->trang_thai;

        $nhapkho->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật phiếu nhập kho thành công!',
            'redirect' => route('nhap-kho')
        ], 200);  
    }

    public function xoa($id)
    {
        $nhapkho = NhapKho::find($id);

        if(empty($nhapkho)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy phiếu nhập kho'
            ], 200); 

        }
        
        $nhapkho->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá phiếu nhập kho thành công!',
            'redirect' => route('nhap-kho')
        ], 200);    
    }
}
