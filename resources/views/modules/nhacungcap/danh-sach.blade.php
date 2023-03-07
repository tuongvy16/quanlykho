@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Nhà cung cấp'">
        <table id="dg-nha-cung-cap" class="easyui-datagrid"></table>
    </div>

    @include('modules.nhacungcap.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;
        function newNhaCungCap(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "nha-cung-cap/them-moi";
        }
        function editNhaCungCap(){
            var row = $('#dg-nha-cung-cap').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'nha-cung-cap/cap-nhat/'+row.id;
            }
        }
        function saveNhaCungCap(){
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
                        $('#dg-nha-cung-cap').datagrid('reload');      // reload the NhaCungCap data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        function destroyNhaCungCap(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-nha-cung-cap').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá nhà cung cấp này không?',function(r){
                    if (r){
                        $.post('NhaCungCap/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-nha-cung-cap').datagrid('reload');    // reload the user data
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
                newNhaCungCap();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editNhaCungCap();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyNhaCungCap();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('NhaCungCap');
            $('#dg-nha-cung-cap').datagrid({
                title:'Danh sách nhà cung cấp',
                iconCls:'icon-save',
                url: "{{ route('nha-cung-cap.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã nhà cung cấp', align:'right'},
                    {field:'ten', title:'Tên nhà cung cấp', align:'right'},
                    {field:'dien_thoai', title:'Điện thoại', align:'right'},
                ]]
            });

           
        });
    </script>

    
@endsection
