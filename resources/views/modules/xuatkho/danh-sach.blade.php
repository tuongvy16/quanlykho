@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Xuất kho'">
        <table id="dg-xuat-kho" class="easyui-datagrid"></table>
    </div>

    @include('modules.xuatkho.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;

        function newXuatKho(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Phiếu xuất kho');
            $('#fm').form('clear');
            url = "xuat-kho/them-moi";
        }

        function editXuatKho(){
            var row = $('#dg-xuat-kho').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'xuat-kho/cap-nhat/'+row.id;
            }
        }

        function saveXuatKho(){
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
                        $('#dg-xuat-kho').datagrid('reload');   // reload the XuatKho data
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        
        function destroyXuatKho(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-xuat-kho').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá phiếu xuất kho này không?',function(r){
                    if (r){
                        $.post('xuat-kho/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-xuat-kho').datagrid('reload');    // reload the user data
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
                newXuatKho();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editXuatKho();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyXuatKho();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('xuat-kho');
            $('#dg-xuat-kho').datagrid({
                title:'Danh sách phiếu xuất kho',
                iconCls:'icon-save',
                url: "{{ route('xuat-kho.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã phiếu xuất', align:'right'},
                    {field:'kho_id', title:'Kho hàng', align:'right'},
                    {field:'hinh_thuc_id', title:'Hình thức', align:'right'},
                    {field:'chuong-trinh_id', title:'Chương trình', align:'right'},
                    {field:'khach_hang_id', title:'Khách hàng', align:'right'},
                    {field:'nhan_vien_xuat_id', title:'Nhân viên xuất', align:'right'},
                    {field:'ghi_chu', title:'Ghi chú', align:'right'},
                    {field:'ngay_duyet', title:'Ngày duyệt', align:'right'},
                    {field:'trang_thai', title:'Trạng thái', align:'right'},
                ]]
            });
        
           
        });
    </script>

    
@endsection
