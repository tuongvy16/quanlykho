@extends('master')
@section('main-content')

    <div data-options="region:'center',title:'Phân quyền'">
        <table id="dg-phan-quyen" class="easyui-datagrid"></table>
    </div>

    @include('modules.phanquyen.form')

@endsection

@section('page-js')

    <script type="text/javascript">
        var url;

        function newPhanQuyen(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "phan-quyen/them-moi";
        }

        function editPhanQuyen(){
            var row = $('#dg-phan-quyen').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'phan-quyen/cap-nhat/'+row.id;
            }
        }

        function savePhanQuyen(){
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
                        $('#dg-phan-quyen').datagrid('reload');      // reload the PhanQuyen data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }

        function destroyPhanQuyen(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-phan-quyen').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá phân quyền này không?',function(r){
                    if (r){
                        $.post('phan-quyen/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-phan-quyen').datagrid('reload');    // reload the user data
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
                newPhanQuyen();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editPhanQuyen();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyPhanQuyen();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('phan-quyen');
            $('#dg-phan-quyen').datagrid({
                title:'Danh sách đơn vị tính',
                iconCls:'icon-save',
                url: "{{ route('phan-quyen.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã phân quyền', align:'right'},
                    {field:'ten', title:'Tên phân quyền', align:'right'},
                ]]
            });        
        });
    </script>
@endsection
