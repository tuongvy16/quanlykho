@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Loại sản phẩm'">
        <table id="dg" 
        title="Danh sách loại sản phẩm" 
        class="easyui-datagrid" 
        url="{{ route('loai-san-pham.danh-sach') }}"
        data-options="method:'get', singleSelect: true,rownumbers: true, pagination:true, fit:true,fitColumns:true,toolbar: '#tb'
        "
        sortName="itemid"
        >
            <thead>
                <tr>
                    <th field="id" width="50">Mã loại</th>
                    <th field="ten" width="50">Tên loại</th>
                </tr>
            </thead>
        </table>
        <div id="tb" style="height:auto">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newLoaiSanPham()">Thêm mới</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editLoaiSanPham()">Cập nhật</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyLoaiSanPham()">Xoá</a>
        </div>
        @include('modules.loaisanpham.form')
    </div>
    @include('modules.loaisanpham.js')
@endsection
