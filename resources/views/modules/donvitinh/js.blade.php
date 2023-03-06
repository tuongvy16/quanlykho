<script type="text/javascript">
    var url;
    function newDonViTinh(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
        $('#fm').form('clear');
        url = "don-vi-tinh/them-moi";
    }
    function editDonViTinh(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
            $('#fm').form('load',row);
            url = 'don-vi-tinh/cap-nhat/'+row.id;
        }
    }
    function saveDonViTinh(){
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
                    $('#dg').datagrid('reload');      // reload the DonViTinh data
                    
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: "Lỗi"
                    });
                }
            }
        });
    }
    function destroyDonViTinh(){
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirm','Bạn có muốn xoá người dùng này không?',function(r){
                if (r){
                    $.post('don-vi-tinh/xoa/'+row.id,function(result){
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






