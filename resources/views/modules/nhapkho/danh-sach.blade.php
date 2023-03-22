@extends('master')
@section('main-content')
    <div data-options="region:'center',title:'Nhập kho'">
        <table id="dg-nhap-kho" class="easyui-datagrid"></table>
    </div>

    @include('modules.nhapkho.form')
@endsection

@section('page-js')

    {{-- <script type="text/javascript">
        var url;
        var arrSanPham = {}
        function getSanPham(){
            console.log(123)
            var loai_san_pham_id = $('#loai_san_pham_id').val()
            $.ajax({
                url: "{{route('get-san-pham')}}",
                type: 'GET',
                data: {id:loai_san_pham_id},
            }).done(function(result) {
                $('#san_pham_id').empty();
                $('#san_pham_id').append($('<option>', {
                    value: "",
                    text : ""
                }));
                $.each(result, function (i, item) {
                    if(item.status==1){

                        $('#san_pham_id').append($('<option>', {
                            value: item.id,
                            text : item.ten
                        }));
                    }
                })
            });
        }

        $('#btn-save').click(function(event) { 
            var data = {
                "loai_san_pham_id": $("#loai_san_pham_id").val(),
                "han_su_dung": $("#han_su_dung").val(),
                "san_pham_id": $("#san_pham_id").val(),
                "so_luong": $("#so_luong").val(),
            }
            var name = $("#loai_san_pham_id").val() + "_" + $("#san_pham_id").val()
            arrSanPham[name] = data
            $("#no-data").remove()
            $('#dg-san-pham-nhap tbody').append(createRow(data,name))

        })
        
        $('#loai_san_pham_id').change(function(event) { 
           console.log(12333);

        })

        function createRow(data,name){
            var row = "<tr id = "+name+">"
                row += "<td></td>" 
                row += "<td>" + data.loai_san_pham_id + "</td>" 
                row += "<td></td>" 
                row += "<td>" + data.han_su_dung + "</td>" 
                row += "<td>" + data.so_luong + "</td>" 
                row += "<td>"
                row += '<a href="javascript:;" onclick="editSanPhamNhap(this)" data-id="'+ name +'" >Sửa</a>'
                row += '<a href="javascript:;" onclick="deleteRow(this)" data-id="'+ name +'" >Xóa</a>'
                row += "</td>" 
                row += '</tr>'
                return row
        }

        function deleteRow(data,name){
            $("")
        }

            
    </script> --}}

    <script type="text/javascript">
        var dsSanPham = new Array();
        $("#btn-save").click(function(){
            var loaiSanPham = $( "#loai_san_pham_id option:selected" ).text();
            var sanPham = $("#san_pham_id option:selected").text()
            var hanSuDung = $("#han_su_dung").val()
            var soLuong = $("#so_luong").val()
            // console.log(loaiSanPham, sanPham, hanSuDung, soLuong);
            if(soLuong > 0){
                var item = new Array(sanPham,loaiSanPham,hanSuDung,soLuong)

                var flag = false
                for (let i = 0; i < dsSanPham.length; i++) {
                    if(dsSanPham[i][0] == sanPham && dsSanPham[i][1] == loaiSanPham){
                        flag = true
                        soLuong = parseInt(dsSanPham[i][3]) + parseInt(soLuong); 
                        dsSanPham[i][3] = soLuong;
                        break;
                    }            
                }
                if(flag == false)
                {
                    dsSanPham.push(item)
                }
                
            }                
            
            showSanPham();

        });

        $("#dg-san-pham-nhap").on("click","#btn-delete",function(){
            $(this).parent().parent().remove();
            var sanPham = $(this).parent().parent().children("td").eq(0).text();

            for (let i = 0; i < dsSanPham.length; i++) {
                if(dsSanPham[i][0] == sanPham)
                {
                    dsSanPham.splice(i,1);
                    break;           
                }
            }
            showSanPham();
        });

        $("#dg-san-pham-nhap").on("click","#btn-edit",function(){
            // console.log(1);

            $('#dlg-san-pham-nhap-update').dialog('open').dialog('center').dialog('setTitle','Cập nhật sản phẩm');

        });

        function showSanPham(){
            var str =""
            for (let i = 0; i < dsSanPham.length; i++) {
                str += "<tr><td>"+dsSanPham[i][0]+"</td>" + 
                            "<td style = 'text-align: center'>"+dsSanPham[i][1]+"</td>"   +
                            "<td style = 'text-align: center'>dvt</td>" +  
                            "<td style = 'text-align: center'>"+dsSanPham[i][2]+"</td>"   +        
                            "<td style = 'text-align: center'>"+dsSanPham[i][3]+"</td>"   +        
                            "<td style = 'text-align: center'><a href='javascript:void(0)' style='color: black' id='btn-edit'>Sửa</a> | <a href='javascript:void(0)' style='color: black' id='btn-delete'>Xoá</a></td></tr>"       
            }
            if(dsSanPham.length == ""){
                str += "<tr><td colspan = '6' style='text-align: center'>Danh sách sản phẩm trống</td></td></tr>"
            }
            $("#dg-san-pham-nhap tbody").html(str);
            $('#dlg-san-pham-nhap').dialog('close');
        }

    </script>

    <script type="text/javascript">
        var url;

        function newNhapKho(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Phiếu nhập kho');
            $('#fm').form('clear');
            url = "nhap-kho/them-moi";
        }

        function editNhapKho(){
            var row = $('#dg-nhap-kho').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Cập nhật');
                $('#fm').form('load',row);
                url = 'nhap-kho/cap-nhat/'+row.id;
            }
        }

        function saveNhapKho(){
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
                        $('#dg-nhap-kho').datagrid('reload');   // reload the NhapKho data
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        
        function destroyNhapKho(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            var row = $('#dg-nhap-kho').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Bạn có muốn xoá phiếu nhập kho này không?',function(r){
                    if (r){
                        $.post('nhap-kho/xoa/'+row.id,function(result){
                            if (result.status == "success"){
                                $('#dg-nhap-kho').datagrid('reload');    // reload the user data
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
                newNhapKho();
            }
        },{
            text:'Cập nhật',
            iconCls:'icon-edit',
            plain:true,
            handler:function(){
                editNhapKho();
            }
        },{
            text:'Xoá',
            iconCls:'icon-cancel',
            plain:true,
            handler:function(){
                destroyNhapKho();
            }
        }]; 

        $(document).ready(function () {
            selectMenuItem('nhap-kho');
            $('#dg-nhap-kho').datagrid({
                title:'Danh sách phiếu nhập kho',
                iconCls:'icon-save',
                url: "{{ route('nhap-kho.danh-sach') }}",
                method: 'GET',
                rownumbers: true,
                fit: true,
                singleSelect: true,
                toolbar:toolbar,
                columns:[[
                    {field:'id', title:'Mã phiếu nhập', align:'right'},
                    {field:'kho_id', title:'Kho hàng', align:'right', formatter:formatKhoHang},
                    {field:'nha_cung_cap_id', title:'Nhà cung cấp', align:'right', formatter:formatNhaCungCap},
                    {field:'hinh_thuc_id', title:'Hình thức', align:'right', formatter:formatHinhThuc},
                    {field:'chuong_trinh_id', title:'Chương trình', align:'right', formatter:formatChuongTrinh},
                    {field:'khach_hang_id', title:'Khách hàng', align:'right', formatter:formatKhachHang},
                    {field:'nhan_vien_nhap_id', title:'Nhân viên nhập', align:'right'},
                    {field:'trang_thai', title:'Trạng thái', align:'center',formatter: formatTrangThai},
                    {field:'ngay_duyet', title:'Ngày duyệt', align:'right'},
                    {field:'ghi_chu', title:'Ghi chú', align:'right'},
                    {field:'null', align:'right',formatter: formatChucNang},
                ]]
            });

            function formatChucNang(val, row){
                return `<a href="#" style="color:black;padding:10px">Xem chi tiết</a>`
            }            
            
            function formatKhoHang(val, row){
                return row.kho.ten;
            }     
            
            function formatNhaCungCap(val, row){
                return row.nha_cung_cap.ten;
            }           

            function formatHinhThuc(val, row){
                return row.hinh_thuc.ten;
            }      

            function formatChuongTrinh(val, row){
                return row.chuong_trinh.ten;
            } 

            function formatKhachHang(val, row){
                return row.khach_hang.ten;
            } 

            function formatNhanVienNhap(val, row){
                return row.nhan_vien.ho_ten;
            }           

            function formatTrangThai(val, row){
                if(val == 0) 
                {
                    return `<span style="color:red">Chưa duyệt</span>`
                }
                else if(val == 1){
                    return `<span style="color:blue">Nhân viên đã duyệt</span>`
                }
                else if(val == 2){
                    return `<span style="color:blue">Quản lý đã duyệt</span>`
                }
                else if(val == 3){
                    return `<span style="color:green">Hoàn thành</span>`
                }
                else if(val == 4){
                    return `<span style="color:blue">Xem xét lại</span>`
                }
            }
        });
    </script>

    
@endsection
