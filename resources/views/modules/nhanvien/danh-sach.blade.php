@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Nhân viên'">
        <table id="dg-nhan-vien" class="easyui-datagrid"></table>
    </div>

    @include('modules.nhanvien.form')

@endsection

@section('page-js')
    <script type="text/javascript">
        var url;

        function newNhanVien(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Thêm mới');
            $('#fm').form('clear');
            url = "nhan-vien/them-moi";
        }

        function editNhanVien(){
            var row = $('#dg-nhan-vien').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'nhan-vien/cap-nhat/'+row.id;
            }
        }

        function saveNhanVien(){
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
                        $('#dlg').dialog('close');                  // close the dialog
                        $('#dg-nhan-vien').datagrid('reload');   // reload the NhanVien data
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }

        function destroyNhanVien(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-nhan-vien').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá nhân viên này không?',function(r){
                    if (r){
                        $.post('nhan-vien/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-nhan-vien').datagrid('reload');    // reload the user data
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
                newNhanVien();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editNhanVien();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyNhanVien();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('nhan-vien');
            $('#dg-nhan-vien').datagrid({
                title:'Danh sách nhân viên',
                iconCls:'icon-save',
                url: "{{ route('nhan-vien.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã nhân viên', align:'right'},
                    {field:'ten_dang_nhap', title:'Tên đăng nhập', align:'right'},
                    {field:'ho_ten', title:'Họ tên', align:'right'},
                    {field:'ngay_sinh', title:'Ngày sinh', align:'right'},
                    {field:'dien_thoai', title:'Điện thoại', align:'right'},
                    {field:'email', title:'Email', align:'right'},
                    {field:'phan_quyen_id', title:'Phân quyền', align:'right',formatter:formatPhanQuyen},
                    {field:'null', align:'right',formatter: formatChucNang},

                ]]
            });
            function formatPhanQuyen(val, row){
                return row.phan_quyen.ten;
            }

            function formatChucNang(val, row){
                return `<a href="#" style="color:black;padding:10px">Chi tiết quyền</a>`
            }     
           
        });
    </script>    
@endsection
