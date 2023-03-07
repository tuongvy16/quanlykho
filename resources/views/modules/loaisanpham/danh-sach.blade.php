@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Loại sản phẩm'">
        <table id="dg-loai-san-pham" class="easyui-datagrid"></table>
    </div>

    @include('modules.loaisanpham.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;
        function newLoaiSanPham(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "loai-san-pham/them-moi";
        }
        function editLoaiSanPham(){
            var row = $('#dg-loai-san-pham').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'loai-san-pham/cap-nhat/'+row.id;
            }
        }
        function saveLoaiSanPham(){
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
                        $('#dg-loai-san-pham').datagrid('reload');      // reload the LoaiSanPham data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        function destroyLoaiSanPham(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-loai-san-pham').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá loại sản phẩm này không?',function(r){
                    if (r){
                        $.post('loai-san-pham/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-loai-san-pham').datagrid('reload');    // reload the user data
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
                newLoaiSanPham();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editLoaiSanPham();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyLoaiSanPham();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('loai-san-pham');
            $('#dg-loai-san-pham').datagrid({
                title:'Danh sách loại sản phẩm',
                iconCls:'icon-save',
                url: "{{ route('loai-san-pham.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã loại sản phẩm', align:'right'},
                    {field:'ten', title:'Tên loại sản phẩm', align:'right'},
                ]]
            });

           
        });
    </script>

    
@endsection
