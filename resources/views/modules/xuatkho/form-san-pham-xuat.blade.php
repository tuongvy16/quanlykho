<div id="dlg-san-pham-xuat" class="easyui-dialog" style="width:400px; padding:20px 50px"
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">

    {{-- Form thêm sản phẩm --}}
    <form id="fm-san-pham-xuat" method="post" novalidate style="margin:0;padding:20px 50px">
        @csrf

        {{-- Loại sản phẩm --}}
        <div style="margin-bottom:10px">
            <select class="easyui-combobox" name="loai_san_pham_id" label="Loại sản phẩm:" labelPosition="top" style="width:100%;"
                data-options="required:true, missingMessage:'Vui lòng chọn loại sản phẩm'">
                @foreach ($loaiSanPham as $item)
                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                @endforeach
            </select>
        </div>
        {{-- Loại sản phẩm --}}

        {{-- Sản phẩm --}}
        <div style="margin-bottom:10px">
            <select class="easyui-combobox" name="san_pham_id" label="Sản phẩm:" labelPosition="top" style="width:100%;"
                data-options="required:true, missingMessage:'Vui lòng chọn sản phẩm'">
                @foreach ($sanPham as $item)
                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                @endforeach
            </select>
        </div>
        {{-- Sản phẩm --}}

        {{-- Số lượng --}}
        <div style="margin-bottom:10px">
            <input name="so_luong" class="easyui-numberspinner" value="1" style="width:100%;" labelPosition="top" label="Số lượng"
            data-options="min:1,required: true, missingMessage:'Vui lòng nhập số lượng'">
        </div>
        {{-- Số lượng --}}

    </form>
    {{-- Form thêm sản phẩm --}}

</div>

<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px"
        onclick="saveSanPhamXuat()">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px"
        onclick="javascript:$('#dlg-san-pham-xuat').dialog('close')">Huỷ bỏ</a>
</div>
<script type="text/javascript">
    var url;
    function saveSanPhamXuat(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $('#fm-san-pham-xuat').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.status == "success"){
                        $('#dlg-san-pham-xuat').dialog('close');                  // close the dialog
                        $('#dg-san-pham-xuat').datagrid('reload');   // reload the NhapKho data
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: "Lỗi"
                        });
                    }
                }
            });
        }
        
</script>

{{-- <script type="text/javascript">
    $(document).ready(function () {
            $('#dg-san-pham-nhap').datagrid({
                method: 'GET',
                fit: true,
                singleSelect: true,
                columns:[[
                    {field:'ten', title:'Tên', align:'right'},
                    {field:'loai_san_pham_id', title:'Loại sản phẩm', align:'right'},
                    {field:'don_vi_tinh_id', title:'Đơn vị tính', align:'right'},
                    {field:'han_su_dung', title:'Hạn sử dụng', align:'right'},
                    {field:'so_luong', title:'Số lượng', align:'right'},
                ]]
            });        
        });
</script> --}}

<script type="text/javascript">
    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return (d < 10 ? ('0' + d) : d) + '-' + (m < 10 ? ('0' + m) : m) + '-' + y;
    }

    function myparser(s) {
        if (!s) return new Date();
        var ss = (s.split('-'));
        var d = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var y = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }
</script>
