@extends('master')
@section('main-content')

    <div data-options="region:'center',title:'Sản phẩm'">
        <table id="dg-san-pham" class="easyui-datagrid"></table>
    </div>

    @include('modules.sanpham.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;

        function newSanPham(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "san-pham/them-moi";
        }

        function editSanPham(){
            var row = $('#dg-san-pham').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'san-pham/cap-nhat/'+row.id;
            }
        }

        function saveSanPham(){
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
                        $('#dg-san-pham').datagrid('reload');      // reload the SanPham data
                        
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }

        function destroySanPham(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-san-pham').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá sản phẩm này không?',function(r){
                    if (r){
                        $.post('san-pham/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-san-pham').datagrid('reload');    // reload the user data
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
                newSanPham();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editSanPham();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroySanPham();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('san-pham');
            $('#dg-san-pham').datagrid({
                title:'Danh sách sản phẩm',
                iconCls:'icon-save',
                url: "{{ route('san-pham.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã sản phẩm', align:'center'},
                    {field:'ten', title:'Tên sản phẩm', align:'right'},
                    {field:'don_vi_tinh_id', title:'Đơn vị tính', align:'center',formatter: formatDonViTinh},
                    {field:'so_luong_xuat', title:'Số lượng xuất', align:'center'},
                    {field:'so_luong_ton', title:'Số lượng tồn', align:'center'},
                    {field:'tong_so_luong', title:'Tổng số lượng', align:'center'},
                ]]
            });

            function formatDonViTinh(val,row){
                @foreach ($donvitinh as $item)
                    return `<span>{{ $item->ten }}</span>`
                @endforeach
            }
        });
    </script>

    
@endsection
