@extends('master')
@section('main-content')

    <div data-options="region:'center',title:'Đơn vị tính'">
        <table id="dg-don-vi-tinh" class="easyui-datagrid"></table>
    </div>

    @include('modules.donvitinh.form')

@endsection

@section('page-js')

    <script type="text/javascript">
        var url;

        function newDonViTinh(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "don-vi-tinh/them-moi";
        }

        function editDonViTinh(){
            var row = $('#dg-don-vi-tinh').datagrid('getSelected');
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
                        $('#dg-don-vi-tinh').datagrid('reload');      // reload the DonViTinh data
                        
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
            var row = $('#dg-don-vi-tinh').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá đơn vị tính này không?',function(r){
                    if (r){
                        $.post('don-vi-tinh/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-don-vi-tinh').datagrid('reload');    // reload the user data
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
                newDonViTinh();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editDonViTinh();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyDonViTinh();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('don-vi-tinh');
            $('#dg-don-vi-tinh').datagrid({
                title:'Danh sách đơn vị tính',
                iconCls:'icon-save',
                url: "{{ route('don-vi-tinh.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã đơn vị tính', align:'right'},
                    {field:'ten', title:'Tên đơn vị tính', align:'right'},
                ]]
            });        
        });
    </script>
@endsection
