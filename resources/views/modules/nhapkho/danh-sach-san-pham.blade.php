<div style="height:200px">
    <p style="margin: 5px">Danh sách sản phẩm nhập kho:     
        <a href="javascript:void(0)" onclick="newNhapSanPham()">Chọn sản phẩm</a>
    </p>
    @include('modules.nhapkho.form-san-pham-nhap')

    <table class="easyui-datagrid" style="width:1000px;height:100px"
        data-options="singleSelect:true,collapsible:true,method:'get',fit:true">
        <thead>
            <tr>
                <th data-options="field:'itemid',width:100">Tên</th>
                <th data-options="field:'productid',width:100">Loại</th>
                <th data-options="field:'listprice',width:100">Đơn vị tính</th>
                <th data-options="field:'unitcost',width:100">Hạn sử dụng</th>
                <th data-options="field:'attr1',width:100">Số lượng</th>
                <th data-options="field:'status',width:100">Chức năng</th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    var url;
    function newNhapSanPham(){
        $('#dlg-san-pham').dialog('open').dialog('center').dialog('setTitle','Sản phẩm');
        $('#fm-san-pham').form('clear');
    }    
</script>