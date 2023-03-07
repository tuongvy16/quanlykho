@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Chương trình'">
        <table id="dg-chuong-trinh" class="easyui-datagrid"></table>
    </div>

    @include('modules.chuongtrinh.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;
        function newChuongTrinh(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "chuong-trinh/them-moi";
        }
        function editChuongTrinh(){
            var row = $('#dg-chuong-trinh').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'chuong-trinh/cap-nhat/'+row.id;
            }
        }
        function saveChuongTrinh(){
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
                        $('#dlg').dialog('close');                 // close the dialog
                        $('#dg-chuong-trinh').datagrid('reload');      // reload the ChuongTrinh data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        function destroyChuongTrinh(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-chuong-trinh').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá chương trình này không?',function(r){
                    if (r){
                        $.post('chuong-trinh/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-chuong-trinh').datagrid('reload');    // reload the user data
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
                newChuongTrinh();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editChuongTrinh();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyChuongTrinh();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('chuong-trinh');
            $('#dg-chuong-trinh').datagrid({
                title:'Danh sách chương trình',
                iconCls:'icon-save',
                url: "{{ route('chuong-trinh.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã chương trình', align:'right'},
                    {field:'ten', title:'Tên chương trình', align:'right'},
                    {field:'ngay_bat_dau', title:'Ngày bắt đầu', align:'right'},
                    {field:'ngay_ket_thuc', title:'Ngày kết thúc', align:'right'},
                ]]
            });

           
        });
    </script>

    
@endsection
