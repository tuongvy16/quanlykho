@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Nhập kho'">
        <table id="dg-nhap-kho" class="easyui-datagrid"></table>
    </div>

    @include('modules.nhapkho.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;

        function newNhapKho(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới phiếu nhập kho');
            $('#fm').form('clear');
            url = "nhap-kho/them-moi";
        }

        function editNhapKho(){
            var row = $('#dg-nhap-kho').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'nhap-kho/cap-nhat/'+row.id;
            }
        }

        function saveNhapKho(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.status == "success"){
                        $('#dlg').dialog('close');                  // close the dialog
                        $('#dg-nhap-kho').datagrid('reload');   // reload the NhapKho data
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        
        function destroyNhapKho(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-nhap-kho').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá phiếu nhập kho này không?',function(r){
                    if (r){
                        $.post('nhap-kho/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-nhap-kho').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: "Lỗi"
                                });
                            }
                        },'json');
                    }
                });
            }
        } 
    </script>

    <script type="text/javascript">
        var toolbar = [{
            text:'Thêm mới',
            iconCls:'icon-add',
            plain:true,
            handler:function(){
                newNhapKho();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editNhapKho();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyNhapKho();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('nhap-kho');
            $('#dg-nhap-kho').datagrid({
                title:'Danh sách phiếu nhập kho',
                iconCls:'icon-save',
                url: "{{ route('nhap-kho.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã phiếu nhập kho', align:'right'},
                    {field:'kho_id', title:'Tên kho hàng', align:'right'},
                    {field:'nha_cung_cap_id', title:'Tên nhà cung cấp', align:'right'},
                    {field:'hinh_thuc_id', title:'Tên hình thức', align:'right'},
                    {field:'chuong-trinh_id', title:'Tên chương trình', align:'right'},
                    {field:'khach_hang_id', title:'Tên khách hàng', align:'right'},
                    {field:'nhan_vien_nhap_id', title:'Nhân viên nhập', align:'right'},
                    {field:'ghi_chu', title:'Ghi chú', align:'right'},
                    {field:'ngay_duyet', title:'Ngày duyệt', align:'right'},
                    {field:'trang_thai', title:'Trạng thái', align:'right'},
                ]]
            });
        
           
        });
    </script>

    
@endsection
