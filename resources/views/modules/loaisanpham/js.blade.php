<script type="text/javascript">
    var url;
    function newLoaiSanPham(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
        $('#fm').form('clear');
        url = "loai-san-pham/them-moi";
    }
    function editLoaiSanPham(){
        var row = $('#dg').datagrid('getSelected');
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
                    $('#dlg').dialog('close');        // close the dialog
                    $('#dg').datagrid('reload');      // reload the LoaiSanPham data
                    
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
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirm','Bạn có muốn xoá người dùng này không?',function(r){
                if (r){
                    $.post('loai-san-pham/xoa/'+row.id,function(result){
                        if (result.status == "success"){
                            $('#dg').datagrid('reload');    // reload the user data
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






