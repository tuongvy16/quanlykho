@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Hình thức'">
        <table id="dg-hinh-thuc" class="easyui-datagrid"></table>
    </div>

    @include('modules.hinhthuc.form')

@endsection

@section('page-js')

    <script type="text/javascript">
        var url;

        function newHinhThuc(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "hinh-thuc/them-moi";
        }

        function editHinhThuc(){
            var row = $('#dg-hinh-thuc').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'hinh-thuc/cap-nhat/'+row.id;
            }
        }

        function saveHinhThuc(){
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
                        $('#dg-hinh-thuc').datagrid('reload');      // reload the HinhThuc data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }

        function destroyHinhThuc(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-hinh-thuc').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá hình thức này không?',function(r){
                    if (r){
                        $.post('hinh-thuc/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-hinh-thuc').datagrid('reload');    // reload the user data
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
                newHinhThuc();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editHinhThuc();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyHinhThuc();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('hinh-thuc');
            $('#dg-hinh-thuc').datagrid({
                title:'Danh sách đơn vị tính',
                iconCls:'icon-save',
                url: "{{ route('hinh-thuc.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã hình thức', align:'right'},
                    {field:'ten', title:'Tên hình thức', align:'right'},
                ]]
            });

        
        });
    </script>
@endsection
