@extends('master')
@section('main-content')

    <div data-options="region:'center',title:'Kho hàng'">
        <table id="dg-kho" class="easyui-datagrid"></table>
    </div>

    @include('modules.kho.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;

        function newKho(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "kho/them-moi";
        }

        function editKho(){
            var row = $('#dg-kho').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'kho/cap-nhat/'+row.id;
            }
        }

        function saveKho(){
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
                        $('#dg-kho').datagrid('reload');      // reload the Kho data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }

        function destroyKho(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-kho').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá kho hàng này không?',function(r){
                    if (r){
                        $.post('kho/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-kho').datagrid('reload');    // reload the user data
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
                newKho();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editKho();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyKho();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('kho');
            $('#dg-kho').datagrid({
                title:'Danh sách kho hàng',
                iconCls:'icon-save',
                url: "{{ route('kho.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã kho hàng', align:'right'},
                    {field:'ten', title:'Tên kho hàng', align:'right'},
                ]]
            });

           
        });
    </script>

    
@endsection
