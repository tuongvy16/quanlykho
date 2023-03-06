@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Đơn vị tính'">
        <table id="dg" 
        title="Danh sách đơn vị tính" 
        class="easyui-datagrid" 
        url="{{ route('don-vi-tinh.danh-sach') }}"
        data-options="method:'get', singleSelect: true,rownumbers: true, pagination:true, fit:true,fitColumns:true,toolbar: '#tb'
        "
        sortName="itemid"
        >
            <thead>
                <tr>
                    <th field="id" width="50">Mã đơn vị</th>
                    <th field="ten" width="50">Tên đơn vị</th>
                </tr>
            </thead>
        </table>
        <div id="tb" style="height:auto">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newDonViTinh()">Thêm mới</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editDonViTinh()">Cập nhật</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyDonViTinh()">Xoá</a>
        </div>
        @include('modules.donvitinh.form')
    </div>
    @include('modules.donvitinh.js')
@endsection
