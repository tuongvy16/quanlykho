<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
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
        $nhaCungCap = NhaCungCap::all();
        $hinhThuc = HinhThuc::all();
        $chuongTrinh = ChuongTrinh::all();
        $khachHang = KhachHang::all();
        $sanPham = SanPham::all();
        $loaiSanPham = LoaiSanPham::all();
        return view('modules.nhapkho.danh-sach',compact('kho','nhaCungCap','hinhThuc','chuongTrinh','khachHang','sanPham','loaiSanPham'));
    }

    public function danhSach()
    {
        $nhapKho = NhapKho::with('kho')
                            ->with('nha_cung_cap')
                            ->with('hinh_thuc')
                            ->with('chuong_trinh')
                            ->with('khach_hang')
                            ->with('nhan_vien')
                            ->get();

        return response()->json($nhapKho);
    }

    public function themMoi(Request $request)
    {
        $nhapKho = new NhapKho();
        $nhapKho->kho_id = $request->kho_id;
        $nhapKho->nha_cung_cap_id = $request->nha_cung_cap_id;
        $nhapKho->hinh_thuc_id = $request->hinh_thuc_id;
        $nhapKho->chuong_trinh_id = $request->chuong_trinh_id;
        $nhapKho->khach_hang_id = $request->khach_hang_id;
        $nhapKho->nhan_vien_nhap_id = $request->nhan_vien_nhap_id;
        $nhapKho->ghi_chu = $request->ghi_chu;
        $nhapKho->ngay_duyet = $request->ngay_duyet;
        $nhapKho->trang_thai = $request->trang_thai;
        
        $nhapKho->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm phiếu nhập kho thành công!',
            'redirect' => ('nhap-kho')            
        ], 200);    
    }

    public function capNhat(Request $request, $id)
    {
        $nhapKho = NhapKho::find($id);
        $nhapKho->kho_id = $request->kho_id;
        $nhapKho->nha_cung_cap_id = $request->nha_cung_cap_id;
        $nhapKho->hinh_thuc_id = $request->hinh_thuc_id;
        $nhapKho->chuong_trinh_id = $request->chuong_trinh_id;
        $nhapKho->khach_hang_id = $request->khach_hang_id;
        $nhapKho->nhan_vien_nhap_id = $request->nhan_vien_nhap_id;
        $nhapKho->ghi_chu = $request->ghi_chu;
        $nhapKho->ngay_duyet = $request->ngay_duyet;
        $nhapKho->trang_thai = $request->trang_thai;

        $nhapKho->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật phiếu nhập kho thành công!',
            'redirect' => route('nhap-kho')
        ], 200);  
    }

    public function xoa($id)
    {
        $nhapKho = NhapKho::find($id);

        if(empty($nhapKho)) {
            return response()->json([
                'status'    => 'error',
                'message'  => 'Không tìm thấy phiếu nhập kho'
            ], 200); 

        }
        
        $nhapKho->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Xoá phiếu nhập kho thành công!',
            'redirect' => route('nhap-kho')
        ], 200);    
    }

    // public function getSanPham(Request $request)
    // {
    //     $dsSanPham = [];
    //     $dsCTSanPham = ChiTietSanPham::where('loai_san_pham_id',$request->id)->get();
    //     $subset         = $dsCTSanPham->map(function ($chiTietSanPham) {
    //         $sanPham    = SanPham::where('id', $chiTietSanPham->san_pham_id)->first();
    //             return collect(
    //                 [
    //                     'id'    => $sanPham->id,
    //                     'ten'  => $sanPham->ten,
    //                 ]
    //             );

    //         });
    //     return $subset;
    // }

}
