@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Khách hàng'">
        <table id="dg-khach-hang" class="easyui-datagrid"></table>
    </div>

    @include('modules.khachhang.form')

@endsection

@section('page-js')

    <script type="text/javascript">
        var url;

        function newKhachHang(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "khach-hang/them-moi";
        }

        function editKhachHang(){
            var row = $('#dg-khach-hang').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'khach-hang/cap-nhat/'+row.id;
            }
        }

        function saveKhachHang(){
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
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg-khach-hang').datagrid('reload');      // reload the KhachHang data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }

        function destroyKhachHang(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-khach-hang').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá khách hàng này không?',function(r){
                    if (r){
                        $.post('khach-hang/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-khach-hang').datagrid('reload');    // reload the user data
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
                newKhachHang();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editKhachHang();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyKhachHang();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('khach-hang');
            $('#dg-khach-hang').datagrid({
                title:'Danh sách khách hàng',
                iconCls:'icon-save',
                url: "{{ route('khach-hang.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã khách hàng', align:'right'},
                    {field:'ten', title:'Tên khách hàng', align:'right'},
                ]]
            });

        
        });
    </script>
@endsection
